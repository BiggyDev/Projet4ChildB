<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProviderController extends AbstractController
{
    /**
     * @Route("/provider", name="provider")
     */
    public function index()
    {
        return $this->render('provider/index.html.twig', [
            'controller_name' => 'ProviderController',
        ]);
    }
}
