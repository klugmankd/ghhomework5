<?php

namespace BlogBundle\Controller;


use BlogBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class PostController extends Controller
{
    
    /**
     * @Route("/", name="homepage")
     */
    public function locateAction() {
        $msg = 'This is a homepage';
        return new JsonResponse(array(
            'msg' => $msg,
        ));
    }

    /**
     * Matches /posts/*
     *
     * @Route("posts/show/{id}", name="show_post", requirements={"id" = "\d+"}, defaults={"id": "1"})
     * @Method("GET")
     */
    public function showAction(Request $request) {
        $post = new Post();
        $msg = $post->get($request->get('id'));
        return new JsonResponse(array(
            'id' => $msg['id'],
            'title' => $msg['title'],
            'content' => $msg['content']
        ));
    }

    /**
     * Matches /posts/*
     *
     * @Route("posts/create/{id}/{title}/{content}", name="create_post", requirements={"id" = "\d+"})
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');
        $post = new Post();
        $msg = $post->add($id, $title, $content);
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * Matches /posts/*
     *
     * @Route("posts/update/{id}/{newTitle}/{newContent}", name="update_post", requirements={"id" = "\d+"})
     * @Method("PUT")
     */
    public function updateAction(Request $request) {
        $post = new Post();
        $id = $request->get('id');
        $title = $request->get('newTitle');
        $content = $request->get('newContent');
        $msg = $post->edit($id, $title, $content);
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * Matches /posts/*
     *
     * @Route("posts/delete/{id}", name="delete_post", requirements={"id" = "\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request) {
        $post = new Post();
        $msg = $post->remove($request->get('id'));
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }
}