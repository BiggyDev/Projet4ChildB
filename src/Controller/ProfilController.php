<?php

namespace App\Controller;

use App\Entity\Client;
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

//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function showProfilProvider()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }
//
//    /**
//     * @Route("/profil", name="profil")
//     */
//    public function modifyProfilClient()
//    {
//        return $this->render('profil/index.html.twig', [
//            'controller_name' => 'ProfilController',
//        ]);
//    }

}
