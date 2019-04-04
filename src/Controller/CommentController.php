<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    public function sendCommentProvider($idClient, $idProvider)
    {
        $errors = array ();
        if(isset($_POST['submit'])){
            $title = trim(strip_tags($POST['title']));
            $comment = trim(strip_tags($_POST['comment']));
            $grade = trim(strip_tags($_POST['grade']));

            if(isset($title)){
                if(strlen($title) < 0 || strlen($title) > 80 || ){
                    $errors['title'] = 'Le titre doit être compris entre 0 et 80 caractères, et n\'être composé que de caractères alphanumériques';
                }
            }else{
                $errors['title'] = 'Veuillez renseigner un titre';
            }

            if(isset($comment)) {
                if (strlen($comment) < 0 || strlen($comment) > 300) {
                    $errors['comment'] = 'Le commentaire doit être compris entre 0 et 300 caractères';
                }
            }else{
                $errors['comment'] = 'Veuillez renseigner un commentaire';
            }

            if(isset($grade)) {
                if ($grade < 0 || $grade > 5) {
                    $errors['grade'] = 'La note doit être comprise entre 0 et 5';
                }
            }else{
                $errors['grade'] = 'Veuillez renseigner une note'
            }

            if(count($errors) == 0 ){

            }

        }else{
            return '404';
        }
    }

    public function showCommentProvider($idClient, $idProvider)
    {

    }

    public function sendCommentClient($idClient, $idProvider)
    {

    }

    public function showCommentClient($idClient, $idProvider)
    {

    }
}
