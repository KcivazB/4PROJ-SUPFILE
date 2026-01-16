<?php

namespace App\Entity;

use App\Repository\LinkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\LinkPermissionLevel;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: LinkRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['link:read']],
    denormalizationContext: ['groups' => ['link:write']]
)]
class Link
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(['link:read', 'link:write'])]
    private ?Node $node = null;

    #[ORM\Column(length: 64, unique:true)]
    private ?string $token = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $password_hash = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $expires_at = null;

    #[ORM\Column(nullable: true)]
    private ?int $max_downloads = null;

    #[ORM\Column(nullable: true)]
    private ?int $download_count = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'links')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['link:read', 'link:write'])]
    private ?User $creator = null;

    #[ORM\Column(type: "string", enumType: LinkPermissionLevel::class)]
    private LinkPermissionLevel $permissionLevel;

    /**
     * @var Collection<int, LinkSession>
     */
    #[ORM\OneToMany(targetEntity: LinkSession::class, mappedBy: 'link')]
    private Collection $linkSessions;

    public function __construct()
    {
        $this->linkSessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNode(): ?Node
    {
        return $this->node;
    }

    public function setNode(?Node $node): static
    {
        $this->node = $node;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function getPasswordHash(): ?string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(?string $password_hash): static
    {
        $this->password_hash = $password_hash;

        return $this;
    }

    public function getExpiresAt(): ?\DateTimeImmutable
    {
        return $this->expires_at;
    }

    public function setExpiresAt(?\DateTimeImmutable $expires_at): static
    {
        $this->expires_at = $expires_at;

        return $this;
    }

    public function getMaxDownloads(): ?int
    {
        return $this->max_downloads;
    }

    public function setMaxDownloads(?int $max_downloads): static
    {
        $this->max_downloads = $max_downloads;

        return $this;
    }

    public function getDownloadCount(): ?int
    {
        return $this->download_count;
    }

    public function setDownloadCount(?int $download_count): static
    {
        $this->download_count = $download_count;

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

    public function getCreator(): ?User
    {
        return $this->creator;
    }

    public function setCreator(?User $creator): static
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * @return Collection<int, LinkSession>
     */
    public function getLinkSessions(): Collection
    {
        return $this->linkSessions;
    }

    public function addLinkSession(LinkSession $linkSession): static
    {
        if (!$this->linkSessions->contains($linkSession)) {
            $this->linkSessions->add($linkSession);
            $linkSession->setLink($this);
        }

        return $this;
    }

    public function removeLinkSession(LinkSession $linkSession): static
    {
        if ($this->linkSessions->removeElement($linkSession)) {
            // set the owning side to null (unless already changed)
            if ($linkSession->getLink() === $this) {
                $linkSession->setLink(null);
            }
        }

        return $this;
    }

    public function getPermissionLevel(): LinkPermissionLevel
    {
        return $this->permissionLevel;
    }

    public function setPermissionLevel(LinkPermissionLevel $permissionLevel): self
    {
        $this->permissionLevel = $permissionLevel;
        return $this;
    }
}
