<?php
namespace App\Form;

use App\Document\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nombreHeures', IntegerType::class, [
            'label' => 'Nombre d\'heures',
            'attr' => ['min' => 1, 'max' => 3, 'class'=>'form-control'], // Exemple de limitation
            'label_attr' => ['class' => 'form-label'],
        ])
        ->add('date', DateTimeType::class, [
            'label' => 'Date et heure de début',
            'attr' => ['class'=>'form-control'],
            'label_attr' => ['class' => 'form-label'],
            'widget' => 'single_text',
            'html5' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
