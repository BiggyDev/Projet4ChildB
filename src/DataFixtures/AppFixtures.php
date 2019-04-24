<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Client;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        function generateRandomString($length)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        // Create 20 clients
        $dateTime = new \DateTime(date('Y/m/d'));
        for ($i = 0; $i < 20; $i++) {
            $password = generateRandomString(10);
            $token = generateRandomString(30);
            $gender = array('Male', 'Female');
            $result = array_rand($gender);
            $client = new Client();
            $client->setName('nom ' . $i);
            $client->setLastname('prenom' . $i);
            $client->setEmail('mail' . $i . '@gmail.com');
            $client->setPassword($password);
            $client->setToken($token);
            $client->setCreatedAt($dateTime);
            $client->setDescription('Kale chips glossier poke readymade, umami tousled bicycle rights plaid.');
            $client->setPhone(rand(1111111111, 9999999999));
            $client->setAge(rand(10, 100));
            $client->setGender($gender[$result]);
            $manager->persist($client);
        }
    }
}
