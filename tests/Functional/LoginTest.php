<?php
namespace App\Tests\Functional;

class LoginTest extends WebTestCaseWithUser
{
    public function testLogin(): void
    {
        $client = $this->createUserAndLogin();
        
        // After successful login, check we're on home page and logged in
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('nav', 'Hi, Test');
    }

    public function testLogout(): void
    {
        $client = $this->createUserAndLogin();
        
        // Verify we're logged in first
        $this->assertSelectorTextContains('nav', 'Hi, Test');
        
        // Test logout functionality - this should hit the logout method
        $client->request('GET', '/logout');
        $this->assertResponseRedirects('/');
        
        $client->followRedirect();
        $this->assertSelectorTextContains('nav', 'Login');
        
        // Test accessing login page again to ensure we're fully logged out
        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
    }
}
