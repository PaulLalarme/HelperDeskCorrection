<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\Priority;
use App\Enum\Status;
use App\Repository\TicketRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{
    /* -----------------------------------------------------------------
     |  Propriétés privées
     | ----------------------------------------------------------------- */

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $titre;

    #[ORM\Column(type: Types::TEXT)]
    private string $description;

    #[ORM\Column(length: 10, enumType: Priority::class)]
    private Priority $priorite = Priority::LOW;

    #[ORM\Column(length: 10, enumType: Status::class)]
    private Status $statut = Status::OPEN;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private \DateTimeImmutable $createdAt;

    /* -----------------------------------------------------------------
     |  Constructeur
     | ----------------------------------------------------------------- */

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    /* -----------------------------------------------------------------
     |  Getters / Setters
     | ----------------------------------------------------------------- */

    public function getId(): ?int
    {
        return $this->id;
    }

    /* --------- Titre --------- */

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    /* ----- Description ----- */

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /* -------- Priorité ------- */

    public function getPriorite(): Priority
    {
        return $this->priorite;
    }

    public function setPriorite(Priority $priorite): self
    {
        $this->priorite = $priorite;

        return $this;
    }

    /* --------- Statut -------- */

    public function getStatut(): Status
    {
        return $this->statut;
    }

    public function setStatut(Status $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /* ------ Date de création ------ */

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }
}
