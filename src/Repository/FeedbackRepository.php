<?php
namespace App\Repository;

use App\Entity\Feedback;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FeedbackRepository extends ServiceEntityRepository 
{ 
    public function __construct(ManagerRegistry $r)
    { 
        parent::__construct($r, Feedback::class);
    } 
}