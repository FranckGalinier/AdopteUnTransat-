<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection:'transat')]
class Transat{

  #[MongoDB\Id]
  private string $id;

  #[MongoDB\Field(type: "string")]
  private string $type;

  #[MongoDB\Field(type: "string")]
  private string $emplacement;

  #[MongoDB\Field(type: "collection")]
  private array $heureReservations = [];


  public function getId(): ?string
  {
    return $this->id;
  }


  public function getType(): ?string
  {
    return $this->type;
  }

  public function setType(string $type): Transat
  {
    $this->type = $type;

    return $this;
  }

  public function getEmplacement(): ?string
  {
    return $this->emplacement;
  }

  public function setEmplacement(string $emplacement): Transat
  {
    $this->emplacement = $emplacement;

    return $this;
  }

  public function getHeureReservations(): ?array
  {
    return $this->heureReservations;
  }

  public function setHeureReservations(array $heureReservations): Transat
  {
    $this->heureReservations = $heureReservations;

    return $this;
  }


}

