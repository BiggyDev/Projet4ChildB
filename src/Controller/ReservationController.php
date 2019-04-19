<?php
/**
 * Created by PhpStorm.
 * User: nicon
 * Date: 03/04/2019
 * Time: 14:54
 */

namespace App\Controller;


class ReservationController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function index()
    {
        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
        ]);
    }

    public function newReservation($id, $idClient, $idProvider, $date, $heureDebut, $heureFin)
    {

    }

    public function deleteReservation($id)
    {

    }
}
