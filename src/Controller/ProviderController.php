<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Repository\ProviderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ProviderController extends AbstractController
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
     * @Route("providers/{email}/{password}", name="providerRegister")
     * @param $email
     * @param $password
     * @return Response
     */
    public function register($email, $password)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $provider = new Provider();
        $provider->setEmail($email);
        $provider->setPassword($this->passwordEncoder->encodePassword($provider, $password));
        $provider->setToken($this->generateRandomString(255));
        $provider->setCreatedAt($this->generateInstantDate());

        $entityManager->persist($provider);
        $entityManager->flush();

        return new Response('Saved new provider with id '.$provider->getId());
    }
}
