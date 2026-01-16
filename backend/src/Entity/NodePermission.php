<?php

namespace App\Entity;

use App\Repository\NodePermissionRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\NodePermissionLevel;

#[ORM\Entity(repositoryClass: NodePermissionRepository::class)]
class NodePermission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'nodePermissions')]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private ?Node $node = null;

    #[ORM\ManyToOne(inversedBy: 'nodePermissions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $target_user = null;

    #[ORM\ManyToOne(inversedBy: 'shared_nodes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $shared_by = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $accepted_at = null;

    #[ORM\Column]
    private ?bool $notification_sent = null;

    #[ORM\Column(type: "string", enumType: NodePermissionLevel::class)]
    private NodePermissionLevel $permissionLevel;

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

    public function getTargetUser(): ?User
    {
        return $this->target_user;
    }

    public function setTargetUser(?User $target_user): static
    {
        $this->target_user = $target_user;

        return $this;
    }

    public function getSharedBy(): ?User
    {
        return $this->shared_by;
    }

    public function setSharedBy(?User $shared_by): static
    {
        $this->shared_by = $shared_by;

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

    public function getAcceptedAt(): ?\DateTimeImmutable
    {
        return $this->accepted_at;
    }

    public function setAcceptedAt(?\DateTimeImmutable $accepted_at): static
    {
        $this->accepted_at = $accepted_at;

        return $this;
    }

    public function isNotificationSent(): ?bool
    {
        return $this->notification_sent;
    }

    public function setNotificationSent(bool $notification_sent): static
    {
        $this->notification_sent = $notification_sent;

        return $this;
    }

    public function getPermissionLevel(): NodePermissionLevel
    {
        return $this->permissionLevel;
    }

    public function setPermissionLevel(NodePermissionLevel $permissionLevel): self
    {
        $this->permissionLevel = $permissionLevel;
        return $this;
    }
}
