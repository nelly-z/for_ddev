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
}