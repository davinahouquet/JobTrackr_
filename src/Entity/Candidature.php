<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_candidature = null;

    #[ORM\Column]
    private ?bool $cv = null;

    #[ORM\Column]
    private ?bool $lettre_motivation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_relance = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $entretien = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?Offre $offre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCandidature(): ?\DateTimeInterface
    {
        return $this->date_candidature;
    }

    public function setDateCandidature(\DateTimeInterface $date_candidature): static
    {
        $this->date_candidature = $date_candidature;

        return $this;
    }

    public function getDateCandidatureFr(): ?string
    {
        return $this->date_candidature->format("d-m-Y");
    }

    public function isCv(): ?bool
    {
        return $this->cv;
    }

    public function setCv(bool $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function isLettreMotivation(): ?bool
    {
        return $this->lettre_motivation;
    }

    public function setLettreMotivation(bool $lettre_motivation): static
    {
        $this->lettre_motivation = $lettre_motivation;

        return $this;
    }

    public function getDateRelance(): ?\DateTimeInterface
    {
        return $this->date_relance;
    }

    public function getDateRelanceFr(): ?string
    {
        return $this->date_candidature->format("d-m-Y");
    }

    public function setDateRelance(?\DateTimeInterface $date_relance): static
    {
        $this->date_relance = $date_relance;

        return $this;
    }

    public function getEntretien(): ?string
    {
        return $this->entretien;
    }

    public function setEntretien(?string $entretien): static
    {
        $this->entretien = $entretien;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getOffre(): ?Offre
    {
        return $this->offre;
    }

    public function setOffre(?Offre $offre): static
    {
        $this->offre = $offre;

        return $this;
    }

    // public function candidatureParSemaine(){

    // }

    // public function candidatureParMois(){
        
    // }
}
