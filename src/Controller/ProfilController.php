<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/profil/showclient/{id}", name="profil_show")
     */
    public function showProfilClient()
    {
//        $profil = $this->getDoctrine();
        $entityManager = $this->getEntityManager();
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
