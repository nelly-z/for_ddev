<?php
namespace App\DataFixtures;

use App\Entity\{Service, User, Feedback};
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher){}

    public function load(ObjectManager $om): void
    {
        $faker = Factory::create();

        // Services
        $services = [];
        foreach (['Mentoring','Tutoring','Career Coaching','Workshops','Bootcamp','Scholarship Advice','Resume Help','Interview Prep','Internships','Language Lab'] as $name) {
            $s = (new Service())->setName($name)->setDescription($faker->sentence(10));
            $om->persist($s); $services[]=$s;
        }

        // Users
        $users = [];
        for ($i=0;$i<60;$i++){
            $u = (new User())
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName())
                ->setEmail($faker->unique()->safeEmail())
                ->setBirthday($faker->dateTimeBetween('-30 years','-16 years'))
                ->setExtraInfo($faker->boolean(60)? $faker->paragraph(): null)
                ->setSelectedService($faker->randomElement($services))
                ->setPreferredDate($faker->boolean(70)? $faker->dateTimeBetween('now','+2 months'): null);
            $u->setPassword($this->hasher->hashPassword($u, 'pass1234'));
            $om->persist($u); $users[]=$u;
        }

        // Feedbacks
        for ($i=0;$i<80;$i++){
            $fb = (new Feedback())
                ->setUser($faker->randomElement($users))
                ->setDateVisited($faker->dateTimeBetween('-2 months','now'))
                ->setOverallRating($faker->numberBetween(1,5))
                ->setComments($faker->boolean(70)? $faker->paragraph(2): null)
                ->setExtraFeedback($faker->boolean(40)? $faker->paragraph(): null);
            $om->persist($fb);
        }

        $om->flush();
    }
}