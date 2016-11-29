<?php

namespace BlogBundle\Controller;


use BlogBundle\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    /**
     * Matches /comments/*
     *
     * @Route("comments/show/{id}", name="show_comment", requirements={"id" = "\d+"}, defaults={"id": "1"})
     * @Method("GET")
     */
    public function showAction(Request $request) {
        $comment = new Comment();
        $msg = $comment->get($request->get('id'));
        return new JsonResponse(array(
            'id' => $msg['id'],
            'idAuthor' => $msg['title'],
            'content' => $msg['content']
        ));
    }

    /**
     * Matches /comments/*
     *
     * @Route("/comments/create/{id}/{idAuthor}/{content}", name="create_comment", requirements={"id" = "\d+"})
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $id = $request->get('id');
        $idAuthor = $request->get('idAuthor');
        $content = $request->get('content');
        $comment = new Comment();
        $msg = $comment->add($id, $idAuthor, $content);
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * Matches /comments/*
     *
     * @Route("comments/update/{id}/{newContent}", name="update_comment", requirements={"id" = "\d+"})
     * @Method("PATCH")
     */
    public function updateAction(Request $request) {
        $comment = new Comment();
        $id = $request->get('id');
        $content = $request->get('newContent');
        $msg = $comment->edit($id, $content);
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * Matches /comments/*
     *
     * @Route("comments/delete/{id}", name="delete_comment", requirements={"id" = "\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request) {
        $comment = new Comment();
        $msg = $comment->remove($request->get('id'));
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }
}