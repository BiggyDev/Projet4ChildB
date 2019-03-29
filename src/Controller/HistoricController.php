<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HistoricController extends AbstractController
{
    /**
     * @Route("/historic", name="historic")
     */
    public function index()
    {
        return $this->render('historic/index.html.twig', [
            'controller_name' => 'HistoricController',
        ]);
    }
}
