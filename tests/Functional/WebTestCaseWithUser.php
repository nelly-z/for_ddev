<?php
namespace App\Tests\Functional;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class WebTestCaseWithUser extends WebTestCase
{
    protected function createUserAndLogin($client, string $email='test@example.com', string $pwd='pass1234'): User
    {
        $em = static::getContainer()->get('doctrine')->getManager();
        $hasher = static::getContainer()->get(UserPasswordHasherInterface::class);

        $u = (new User());
        $u->setFirstname('Test')->setLastname('User')->setEmail($email)
          ->setBirthday(new \DateTime('2000-01-01'))
          ->setPassword($hasher->hashPassword($u, $pwd));
        $em->persist($u); $em->flush();

        $client->followRedirects();
        $client->request('GET', '/login');
        $client->submitForm('Sign in', ['_username'=>$email, '_password'=>$pwd]);

        return $u;
    }
}