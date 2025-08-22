<?php
namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name:"users")]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column] private ?int $id = null;

    #[ORM\Column(length:100)]
    #[Assert\NotBlank] private string $firstname;

    #[ORM\Column(length:100)]
    #[Assert\NotBlank] private string $lastname;

    #[ORM\Column(length:180, unique:true)]
    #[Assert\NotBlank, Assert\Email] private string $email;

    #[ORM\Column(type:"date")]
    #[Assert\NotBlank] private \DateTimeInterface $birthday;

    #[ORM\Column] private array $roles = [];

    #[ORM\Column] private string $password; // hashed

    #[ORM\Column(type:"text", nullable:true)]
    private ?string $extraInfo = null;

    #[ORM\ManyToOne(inversedBy: null)]
    private ?Service $selectedService = null;

    #[ORM\Column(type:"datetime", nullable:true)]
    private ?\DateTimeInterface $preferredDate = null;

    public function getId(): ?int { return $this->id; }
    public function getFirstname(): string { return $this->firstname; }
    public function setFirstname(string $v): self { $this->firstname=$v; return $this; }
    public function getLastname(): string { return $this->lastname; }
    public function setLastname(string $v): self { $this->lastname=$v; return $this; }
    public function getEmail(): string { return $this->email; }
    public function setEmail(string $v): self { $this->email=$v; return $this; }
    public function getBirthday(): \DateTimeInterface { return $this->birthday; }
    public function setBirthday(\DateTimeInterface $v): self { $this->birthday=$v; return $this; }
    public function getUserIdentifier(): string { return $this->email; }
    public function getRoles(): array { return array_unique([...$this->roles, 'ROLE_USER']); }
    public function setRoles(array $roles): self { $this->roles=$roles; return $this; }
    public function getPassword(): string { return $this->password; }
    public function setPassword(string $v): self { $this->password=$v; return $this; }
    public function eraseCredentials() {}
    public function getExtraInfo(): ?string { return $this->extraInfo; }
    public function setExtraInfo(?string $v): self { $this->extraInfo=$v; return $this; }
    public function getSelectedService(): ?Service { return $this->selectedService; }
    public function setSelectedService(?Service $s): self { $this->selectedService=$s; return $this; }
    public function getPreferredDate(): ?\DateTimeInterface { return $this->preferredDate; }
    public function setPreferredDate(?\DateTimeInterface $v): self { $this->preferredDate=$v; return $this; }
}