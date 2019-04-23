<?php

namespace App\Controller;

use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends AbstractController
{
    /**
     * @Route("/comment", name="comment")
     */
    public function index()
    {
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }

    /**
     * @Route("/comment/create/{provider_id}/{id}", name="new_comment_provider")
     */
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

    /**
     * @Route("/comment/edit/{provider_id}/{id}", name="comment_provider_edit")
     */
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

    /**
     * @Route("/comment/{provider_id}", name="provider_comment_show")
     */
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

    /**
     * @Route("/comment/create/{client_id}/{id}", name="new_comment_client")
     */
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

    /**
     * @Route("/comment/edit/{client_id}/{id}", name="comment_client_edit")
     */
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

    /**
     * @Route("/comment/{client_id}", name="client_comment_show")
     */
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


