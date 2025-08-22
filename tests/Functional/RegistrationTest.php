<?php
namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationTest extends WebTestCase
{
    public function testRegisterFlow(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/register');
        $this->assertResponseIsSuccessful();

        $form = $crawler->selectButton('Create account')->form([
            'registration_form[firstname]' => 'Alice',
            'registration_form[lastname]' => 'Doe',
            'registration_form[email]' => 'alice@example.com',
            'registration_form[birthday]' => '2002-05-05',
            'registration_form[password][first]' => 'pass1234',
            'registration_form[password][second]' => 'pass1234',
        ]);
        $client->submit($form);
        $this->assertResponseIsSuccessful(); // lands on /
        $this->assertSelectorExists('nav:contains("Hi, Alice")');
    }
}