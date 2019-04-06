<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClientController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function generateInstantDate()
    {
        $datetime = new \DateTime(date('Y/m/d'));

        return $datetime;
    }

    /**
     * @Route("/register/{email}/{password}", name="register")
     * @param $email
     * @param $password
     * @return Response
     */
    public function register($email, $password)
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setEmail($email);
        $client->setPassword($this->passwordEncoder->encodePassword($client, $password));
        $client->setToken($this->generateRandomString(255));
        $client->setCreatedAt($this->generateInstantDate());

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($client);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new client with id '.$client->getId());
    }


}
