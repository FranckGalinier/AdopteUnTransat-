<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection:'reservation')]
class Reservation
{
    #[MongoDB\Id]
    private ?string $id=null;

    #[MongoDB\Field(type: "date")]
    private \DateTime $date;

    #[MongoDB\Field(type: "int")]
    private int $nombreHeures;

    #[MongoDB\ReferenceOne(targetDocument: Transat::class)]
    private Transat $transat;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getNombreHeures(): int
    {
        return $this->nombreHeures;
    }

    public function setNombreHeures(int $nombreHeures): self
    {
        $this->nombreHeures = $nombreHeures;
        return $this;
    }

    public function getTransat(): ?Transat
    {
        return $this->transat;
    }

    public function setTransat(Transat $transat): self
    {
        $this->transat = $transat;
        return $this;
    }
}
