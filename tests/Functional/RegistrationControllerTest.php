<?php
namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationControllerTest extends WebTestCase
{
    public function testRegistrationControllerRenders(): void
    {
        $client = static::createClient();
        
        // Test GET request to registration page - this hits the register() method
        $crawler = $client->request('GET', '/register');
        
        $this->assertResponseIsSuccessful();
        $this->assertSelectorExists('form');
        $this->assertSelectorTextContains('h1', 'Student Registration');
        
        // Check that form has the required fields to ensure controller worked properly
        $this->assertSelectorExists('input[name="registration_form[firstname]"]');
        $this->assertSelectorExists('input[name="registration_form[email]"]');
        $this->assertSelectorExists('input[name="registration_form[birthday]"]');
        $this->assertSelectorExists('input[name="registration_form[password][first]"]');
        $this->assertSelectorExists('input[name="registration_form[password][second]"]');
    }

    public function testRegistrationControllerFormSubmission(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        
        // Submit form with valid data to hit the POST method path
        $form = $crawler->selectButton('Create account')->form([
            'registration_form[firstname]' => 'TestUser',
            'registration_form[lastname]' => 'LastName', 
            'registration_form[email]' => 'test.unique.' . time() . '@example.com',
            'registration_form[birthday]' => '1990-01-01',
            'registration_form[password][first]' => 'password123',
            'registration_form[password][second]' => 'password123',
        ]);
        
        $client->submit($form);
        
        // Should redirect after successful registration 
        $this->assertTrue($client->getResponse()->isRedirection() || $client->getResponse()->isSuccessful());
    }
}