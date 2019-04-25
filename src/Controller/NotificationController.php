<?php
/**
 * Created by PhpStorm.
 * User: nicon
 * Date: 03/04/2019
 * Time: 14:53
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="notification ")
     */
    public function index()
    {
        return $this->render('notification/index.html.twig', [
            'controller_name' => 'NotificationController',
        ]);
    }
}
