<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    public function postCommentProvider($id, $idClient, $idProvider, $title, $article, $score)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No client found for id '.$id
            );
        }

        $comment = new Comment();
        $comment->setClient($idClient);
        $comment->setProvider($idProvider);
        $comment->setTitle($title);
        $comment->setArticle($article);
        $comment->setScore($score);

        $entityManager->flush();

        return new Response('Comment sent'. $comment->getId());
    }

    public function modifyCommentProvider($id, $idClient, $idProvider, $title, $article, $score)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found'
            );
        }
        $comment = new Comment();
        $comment->setClient($idClient);
        $comment->setProvider($idProvider);
        $comment->setTitle($title);
        $comment->setArticle($article);
        $comment->setScore($score);

        $entityManager->flush();

        return new Response('Comment edited'. $comment->getId());
    }

    public function showCommentProvider($id, $idProvider)
    {
        $comment = $this_>getDoctrine()
            ->getRepository(Comment::class)
            ->find($id, $idProvider);

        if (!$comment) {
            throw $this->createNotFoundException(
                'Aucun commentaire trouvé'
            );}
        $comment = $this->get('serializer')->serialize($profil, 'json');

        $response = new Response($comment);
        $response->headers->set('Content-Type', 'applicaton/json')
    }

    public function postCommentClient($id, $idClient, $idProvider, $title, $article, $score)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found'
            );
        }

        $comment = new Comment();
        $comment->setClient($idClient);
        $comment->setProvider($idProvider);
        $comment->setTitle($title);
        $comment->setArticle($article);
        $comment->setScore($score);

        $entityManager->flush();

        return new Response('Comment sent'. $comment->getId());
    }

    public function modifyCommentClient($id, $idClient, $idProvider, $title, $article, $score)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found'
            );
        }
        $comment = new Comment();
        $comment->setClient($idClient);
        $comment->setProvider($idProvider);
        $comment->setTitle($title);
        $comment->setArticle($article);
        $comment->setScore($score);

        $entityManager->flush();
        return new Response('Comment edited'. $comment->getId());
    }

    public function showCommentClient($id, $idClient)
    {
        $comment = $this_>getDoctrine()
                ->getRepository(Comment::class)
                ->find($id, $idClient);

        if (!$comment) {
            throw $this->createNotFoundException(
                'Aucun commentaire trouvé'
            );}

        $comment = $this->get('serializer')->serialize($profil, 'json');
        $response = new Response($comment);
        $response->headers->set('Content-Type', 'applicaton/json')
    }

    /**
     * @Route("comments/delete/{id}", name="comment_delete")
     */
    public function deleteComment($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $comment = $entityManager->getRepository(Comment::class)->find($id);

        if (!$comment) {
            throw $this->createNotFoundException(
                'No comment found '
            );
        }

        $entityManager->remove($comment);
        $entityManager->flush();
    }
}
