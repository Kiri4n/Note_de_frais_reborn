<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\FraisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FraisRepository::class)]
#[ApiResource]
class Frais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?FraisType $fraisTypeId = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Note $noteId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFraisTypeId(): ?FraisType
    {
        return $this->fraisTypeId;
    }

    public function setFraisTypeId(?FraisType $fraisTypeId): self
    {
        $this->fraisTypeId = $fraisTypeId;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getNoteId(): ?Note
    {
        return $this->noteId;
    }

    public function setNoteId(?Note $noteId): self
    {
        $this->noteId = $noteId;

        return $this;
    }
}
