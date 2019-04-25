<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Provider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

    /**
     * @Route("/historic/client/{id]", name="historic_show")
     */
    public function showHistoricClient($id)
    {
        $historic = $this->getDoctrine()
            ->getRepository(Client::class)
            ->find($id);

        if (!$historic) {
            throw $this->createNotFoundException(
                'Aucun historique trouvé pour cet id : '.$id
            );
        }
        $historic = $this->get('serializer')->serialize($historic, 'json');

        $response = new Response($historic);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/historic/provider/{id]", name="historic_show")
     */
    public function showHistoricProvider($id)
    {
        $historic = $this->getDoctrine()
            ->getRepository(Provider::class)
            ->find($id);

        if (!$historic) {
            throw $this->createNotFoundException(
                'Aucun historique trouvé pour cet id : '.$id
            );
        }
        $historic = $this->get('serializer')->serialize($historic, 'json');

        $response = new Response($historic);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
