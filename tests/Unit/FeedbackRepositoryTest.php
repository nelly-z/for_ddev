<?php
namespace App\Tests\Unit;

use App\Repository\FeedbackRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FeedbackRepositoryTest extends KernelTestCase
{
    public function testRepositoryCanBeInstantiated(): void
    {
        $kernel = self::bootKernel();
        $repository = $kernel->getContainer()->get('doctrine')->getRepository(\App\Entity\Feedback::class);
        
        $this->assertInstanceOf(FeedbackRepository::class, $repository);
    }
}