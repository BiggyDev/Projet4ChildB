<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Child;
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

        $entityManager->flush();

        return new Response('Profile edited for client id'. $client->getId());
    }

    /**
     * @Route("clients/profil/child/create/{id}", name="child_creation")
     */
    public function createChildClient($id, $name, $lastname, $info, $age, $gender)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $child = new Child();
        $child->setName($name);
        $child->setLastname($lastname);
        $child->setInfo($info);
        $child->setGender($gender);
        $child->setAge($age);

        $entityManager->persist($child);

        $entityManager->flush();

        return new Response('Saved new child with id '.$child->getId());
    }

    /**
     * @Route("clients/profil/child/create/{id}", name="child_creation")
     */
    public function modifyChildClient($id, $name, $lastname, $info, $age, $gender)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $client = $entityManager->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No client found for id '.$id
            );
        }

        $child = new Child();
        $child->setName($name);
        $child->setLastname($lastname);
        $child->setInfo($info);
        $child->setGender($gender);
        $child->setAge($age);

        $entityManager->flush();

        return new Response('Profile edited for client id'. $client->getId());
    }

    /**
     * @Route("clients/profil/child/delete/{id}", name="child_delete")
     */
    public function deleteChildClient($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $child = $entityManager->getRepository(Child::class)->find($id);

        if (!$child) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $entityManager->remove($child);
        $entityManager->flush();

    }

}
