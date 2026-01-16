<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[ApiResource]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    /**
     * @var Collection<int, Node>
     */
    #[ORM\OneToMany(targetEntity: Node::class, mappedBy: 'owner')]
    private Collection $nodes;

    /**
     * @var Collection<int, Link>
     */
    #[ORM\OneToMany(targetEntity: Link::class, mappedBy: 'creator')]
    #[Groups(['user:read'])]
    private Collection $links;

    /**
     * @var Collection<int, NodePermission>
     */
    #[ORM\OneToMany(targetEntity: NodePermission::class, mappedBy: 'target_user')]
    private Collection $nodePermissions;

    /**
     * @var Collection<int, NodePermission>
     */
    #[ORM\OneToMany(targetEntity: NodePermission::class, mappedBy: 'shared_by')]
    private Collection $shared_nodes;

    /**
     * @var Collection<int, LinkSession>
     */
    #[ORM\OneToMany(targetEntity: LinkSession::class, mappedBy: 'connected_user')]
    private Collection $linkSessions;

    public function __construct()
    {
        $this->nodes = new ArrayCollection();
        $this->links = new ArrayCollection();
        $this->nodePermissions = new ArrayCollection();
        $this->shared_nodes = new ArrayCollection();
        $this->linkSessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Ensure the session doesn't contain actual password hashes by CRC32C-hashing them, as supported since Symfony 7.3.
     */
    public function __serialize(): array
    {
        $data = (array) $this;
        $data["\0".self::class."\0password"] = hash('crc32c', $this->password);

        return $data;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

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

    /**
     * @return Collection<int, Node>
     */
    public function getNodes(): Collection
    {
        return $this->nodes;
    }

    public function addNode(Node $node): static
    {
        if (!$this->nodes->contains($node)) {
            $this->nodes->add($node);
            $node->setOwner($this);
        }

        return $this;
    }

    public function removeNode(Node $node): static
    {
        if ($this->nodes->removeElement($node)) {
            // set the owning side to null (unless already changed)
            if ($node->getOwner() === $this) {
                $node->setOwner(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Link>
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }

    public function addLink(Link $link): static
    {
        if (!$this->links->contains($link)) {
            $this->links->add($link);
            $link->setCreator($this);
        }

        return $this;
    }

    public function removeLink(Link $link): static
    {
        if ($this->links->removeElement($link)) {
            // set the owning side to null (unless already changed)
            if ($link->getCreator() === $this) {
                $link->setCreator(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NodePermission>
     */
    public function getNodePermissions(): Collection
    {
        return $this->nodePermissions;
    }

    public function addNodePermission(NodePermission $nodePermission): static
    {
        if (!$this->nodePermissions->contains($nodePermission)) {
            $this->nodePermissions->add($nodePermission);
            $nodePermission->setTargetUser($this);
        }

        return $this;
    }

    public function removeNodePermission(NodePermission $nodePermission): static
    {
        if ($this->nodePermissions->removeElement($nodePermission)) {
            // set the owning side to null (unless already changed)
            if ($nodePermission->getTargetUser() === $this) {
                $nodePermission->setTargetUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, NodePermission>
     */
    public function getSharedNodes(): Collection
    {
        return $this->shared_nodes;
    }

    public function addSharedNode(NodePermission $sharedNode): static
    {
        if (!$this->shared_nodes->contains($sharedNode)) {
            $this->shared_nodes->add($sharedNode);
            $sharedNode->setSharedBy($this);
        }

        return $this;
    }

    public function removeSharedNode(NodePermission $sharedNode): static
    {
        if ($this->shared_nodes->removeElement($sharedNode)) {
            // set the owning side to null (unless already changed)
            if ($sharedNode->getSharedBy() === $this) {
                $sharedNode->setSharedBy(null);
            }
        }

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
            $linkSession->setConnectedUser($this);
        }

        return $this;
    }

    public function removeLinkSession(LinkSession $linkSession): static
    {
        if ($this->linkSessions->removeElement($linkSession)) {
            // set the owning side to null (unless already changed)
            if ($linkSession->getConnectedUser() === $this) {
                $linkSession->setConnectedUser(null);
            }
        }

        return $this;
    }
}
