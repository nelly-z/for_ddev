<?php
namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
class Feedback
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column] private ?int $id=null;

    #[ORM\ManyToOne] #[ORM\JoinColumn(nullable:false)]
    private User $user;

    #[ORM\Column(type:"date")]
    #[Assert\NotBlank] private \DateTimeInterface $dateVisited;

    #[ORM\Column(type:"smallint")]
    #[Assert\Range(min:1, max:5)] private int $overallRating;

    #[ORM\Column(type:"text", nullable:true)]
    private ?string $comments=null;

    #[ORM\Column(type:"text", nullable:true)]
    private ?string $extraFeedback=null;

    public function getId(): ?int { return $this->id; }
    public function getUser(): User { return $this->user; }
    public function setUser(User $u): self { $this->user=$u; return $this; }
    public function getDateVisited(): \DateTimeInterface { return $this->dateVisited; }
    public function setDateVisited(\DateTimeInterface $v): self { $this->dateVisited=$v; return $this; }
    public function getOverallRating(): int { return $this->overallRating; }
    public function setOverallRating(int $v): self { $this->overallRating=$v; return $this; }
    public function getComments(): ?string { return $this->comments; }
    public function setComments(?string $v): self { $this->comments=$v; return $this; }
    public function getExtraFeedback(): ?string { return $this->extraFeedback; }
    public function setExtraFeedback(?string $v): self { $this->extraFeedback=$v; return $this; }
}