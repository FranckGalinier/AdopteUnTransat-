<?php
namespace App\Controller;

use App\Document\Transat;
use App\Document\Reservation;
use App\Form\ReservationType;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="liste_transats")
     */
    #[Route('/', name: 'liste_transats')]
  public function index(DocumentManager $dm, Request $request): Response
  {
      $transats = $dm->getRepository(Transat::class)->findAll();
  
      $forms = [];
      foreach ($transats as $transat) {
          $reservation = new Reservation();
          $forms[$transat->getId()] = $this->createForm(ReservationType::class, $reservation)->createView();

      }
  
      return $this->render('home/index.html.twig', [
          'transats' => $transats,
          'forms' => $forms,
      ]);
  }

    /**
 * @Route("/reserver/{id}", name="reserver", methods={"POST"})
 */
#[Route('/reserver/{id}', name: 'reserver', methods: ['POST'])]
public function reserver(DocumentManager $dm, Request $request, $id): Response
{
    $transat = $dm->getRepository(Transat::class)->find($id);

    if (!$transat) {
        throw $this->createNotFoundException('Transat non trouvé');
    }

    $reservation = new Reservation();
    $form = $this->createForm(ReservationType::class, $reservation);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $reservation = $form->getData();
        $reservation->setTransat($transat);
        $reservation->setDate(new \DateTime());

        
        // Mise à jour des heures de réservation du transat
        $heuresReservations = $transat->getHeureReservations() ?? [];
        $heuresReservations[] = [
            'dateDebut' => $reservation->getDate()->format('Y-m-d H:i'),
            'nombreHeures' => $reservation->getNombreHeures(),
            'idReservation' => $reservation->getId()
        ];
        $transat->setHeureReservations($heuresReservations);

        try {
            $dm->persist($transat);
            $dm->persist($reservation);
            $dm->flush();
            $this->addFlash('success', 'Réservation effectuée avec succès !');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Une erreur est survenue lors de la réservation : ' . $e->getMessage());
        }

        return $this->redirectToRoute('liste_transats');
    }

    // Si le formulaire n'est pas valide, on pourrait rediriger avec un message d'erreur
    $this->addFlash('error', 'Le formulaire de réservation n\'est pas valide.');

    return $this->redirectToRoute('liste_transats');

}

  }
