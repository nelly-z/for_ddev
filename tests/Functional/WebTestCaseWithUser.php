<?php
namespace App\Tests\Functional;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class WebTestCaseWithUser extends WebTestCase
{
    protected function createUserAndLogin(): \Symfony\Bundle\FrameworkBundle\KernelBrowser
    {
        $client = static::createClient();
        
        // Create a test user in database
        $container = static::getContainer();
        $entityManager = $container->get('doctrine')->getManager();
        $passwordHasher = $container->get(UserPasswordHasherInterface::class);

        $email = 'testuser@example.com';
        $password = 'password123';

        // Check if user already exists
        $userRepository = $entityManager->getRepository(User::class);
        $user = $userRepository->findOneBy(['email' => $email]);

        if (!$user) {
            $user = new User();
            $user->setEmail($email);
            $user->setFirstname('Test');
            $user->setLastname('User');
            $user->setBirthday(new \DateTime('2000-01-01'));
            $user->setPassword($passwordHasher->hashPassword($user, $password));

            $entityManager->persist($user);
            $entityManager->flush();
        }

        // Login using actual login form
        $crawler = $client->request('GET', '/login');
        $form = $crawler->selectButton('Sign in')->form([
            '_username' => $email,
            '_password' => $password,
        ]);
        
        $client->submit($form);
        $client->followRedirect(); // Follow redirect after successful login
        
        return $client;
    }
}
