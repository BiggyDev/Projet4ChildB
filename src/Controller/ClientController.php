<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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
     * @Route("clients/{email}/{password}", name="clientRegister")
     * @param $email
     * @param $password
     * @return Response
     */
    public function register($email, $password)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->setEmail($email);
        $client->setPassword($this->passwordEncoder->encodePassword($client, $password));
        $client->setToken($this->generateRandomString(255));
        $client->setCreatedAt($this->generateInstantDate());

        $entityManager->persist($client);
        $entityManager->flush();

        return new Response('Saved new client with id '.$client->getId());
    }

    /**
     * @Route("clients/login{email}/{password}", name="clientLogin")
     * @param $email
     * @param $password
     * @return Response
     */
    public function login($email, $password)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $client = new Client();
        $client->getEmail();
        $client->setPassword($this->passwordEncoder->encodePassword($client, $password));
        $client->setToken($this->generateRandomString(255));
        $client->setCreatedAt($this->generateInstantDate());

        $entityManager->persist($client);
        $entityManager->flush();

        return new Response('Saved new client with id '.$client->getId());
    }


}
