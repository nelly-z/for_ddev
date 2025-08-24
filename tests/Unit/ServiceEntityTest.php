<?php
namespace App\Tests\Unit;

use App\Entity\Service;
use PHPUnit\Framework\TestCase;

class ServiceEntityTest extends TestCase
{
    public function testServiceProperties(): void
    {
        $service = new Service();
        
        $service->setName('Career Advice');
        $service->setDescription('Professional guidance');
        
        $this->assertEquals('Career Advice', $service->getName());
        $this->assertEquals('Professional guidance', $service->getDescription());
        
        // Test that getId works (even if null initially)
        $this->assertNull($service->getId()); // Before persistence
    }
}