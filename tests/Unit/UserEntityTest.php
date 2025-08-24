<?php
namespace App\Tests\Unit;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserEntityTest extends TestCase
{
    public function testRolesAlwaysContainUser(): void
    {
        $u = (new User())->setRoles([]);
        $this->assertContains('ROLE_USER', $u->getRoles());
    }

    public function testUserGettersAndSetters(): void
    {
        $user = new User();
        $date = new \DateTime('1990-01-01');
        
        // Test basic properties
        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setEmail('john@example.com');
        $user->setBirthday($date);
        $user->setPassword('hashedpass');
        
        $this->assertEquals('John', $user->getFirstname());
        $this->assertEquals('Doe', $user->getLastname());
        $this->assertEquals('john@example.com', $user->getEmail());
        $this->assertEquals('john@example.com', $user->getUserIdentifier());
        $this->assertEquals($date, $user->getBirthday());
        $this->assertEquals('hashedpass', $user->getPassword());
        
        // Test optional fields to increase coverage  
        $user->setExtraInfo('Some extra info');
        $prefDate = new \DateTime();
        $user->setPreferredDate($prefDate);
        $this->assertEquals('Some extra info', $user->getExtraInfo());
        $this->assertEquals($prefDate, $user->getPreferredDate());
        
        // Test service relationship to increase coverage
        $service = new \App\Entity\Service();
        $user->setSelectedService($service);
        $this->assertEquals($service, $user->getSelectedService());
        

    }
}