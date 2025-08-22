<?php
namespace App\Tests\Functional;

class LoginTest extends WebTestCaseWithUser
{
    public function testLogin(): void
    {
        $client = static::createClient();
        $this->createUserAndLogin($client);
        $this->assertSelectorExists('a:contains("Logout")');
    }
}