<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
use App\Repository\ProfilClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil")
     */
    public function index()
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    /**
     * @Route("/profil/{id}", name="profil_show")
     */
    public function showProfilClient($id)
    {
          $profil = $this->getDoctrine()
            ->getRepository(Client::class)
            ->find($id);

        if (!$profil) {
            throw $this->createNotFoundException(
                'Aucun profil trouvé pour cet id : '.$id
            );
        }
        $profil = $this->get('serializer')->serialize($profil, 'json');

        $response = new Response($profil);
        $response->headers->set('Content-Type', 'application/json');

        return $response;

        // DEBUG : VUE TEST \\
//        return $this->render('profil/index.html.twig', [
//            'name' => dump($response),
//        ]);
    }

    /**
     * @Route("clients/profil/edit/{id}", name="profil_edit")
     */
    public function modifyInfoProfilClient($id, $name, $lastname, $description, $phone, $age, $gender)

    {
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No client found for id '.$id
            );
        }

        $client = new Client();
        $client->setName($name);
        $client->setLastname($lastname);
        $client->setDescription($description);
        $client->setPhone($phone);
        $client->setAge($age);
        $client->setGender($gender);

        $entityManager->persist($client);
        $entityManager->flush();

        return new Response('Profile edited for client id'. $client->getId());
    }
}
