<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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

        return $profil;
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
