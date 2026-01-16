<?php

namespace App\Entity;

use App\Repository\LinkSessionRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: LinkSessionRepository::class)]
#[ApiResource]
class LinkSession
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'linkSessions')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Link $link = null;

    #[ORM\Column(length: 255)]
    private ?string $session_token = null;

    #[ORM\ManyToOne(inversedBy: 'linkSessions')]
    private ?User $connected_user = null;

    #[ORM\Column(length: 255)]
    private ?string $ip_address = null;

    #[ORM\Column(length: 255)]
    private ?string $user_agent = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(length: 255)]
    private ?string $expires_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?Link
    {
        return $this->link;
    }

    public function setLink(?Link $link): static
    {
        $this->link = $link;

        return $this;
    }

    public function getSessionToken(): ?string
    {
        return $this->session_token;
    }

    public function setSessionToken(string $session_token): static
    {
        $this->session_token = $session_token;

        return $this;
    }

    public function getConnectedUser(): ?User
    {
        return $this->connected_user;
    }

    public function setConnectedUser(?User $connected_user): static
    {
        $this->connected_user = $connected_user;

        return $this;
    }

    public function getIpAddress(): ?string
    {
        return $this->ip_address;
    }

    public function setIpAddress(string $ip_address): static
    {
        $this->ip_address = $ip_address;

        return $this;
    }

    public function getUserAgent(): ?string
    {
        return $this->user_agent;
    }

    public function setUserAgent(string $user_agent): static
    {
        $this->user_agent = $user_agent;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expires_at;
    }

    public function setExpiresAt(string $expires_at): static
    {
        $this->expires_at = $expires_at;

        return $this;
    }
}
