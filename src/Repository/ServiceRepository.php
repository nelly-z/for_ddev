<?php
namespace App\Repository;

use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ServiceRepository extends ServiceEntityRepository 
{ 
    public function __construct(ManagerRegistry $r)
    { 
        parent::__construct($r, Service::class);
    } 
}