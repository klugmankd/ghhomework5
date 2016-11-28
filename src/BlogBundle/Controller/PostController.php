<?php

namespace BlogBundle\Controller;


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
     * @Route("post/show/{id}", name="show_post", requirements={"id" = "\d+"} )
     * @Method("GET")
     */
    public function showAction(Request $request) {
        $msg = "Post create";
        return new JsonResponse(array(
            "msg" => $msg
        ));
    }

    /**
     * @Route("/post/create", name="create_post")
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $msg = 'create post';
        return new JsonResponse(array(
            'msg' => $msg,
        ));
    }

    /**
     * @Route("post/update", name="update_post")
     * @Method("PUT")
     */
    public function updateAction() {
        $msg = 'Post edit';
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * @Route("post/delete", name="delete_post")
     * @Method("DELETE")
     */
    public function deleteAction() {
        $msg = 'Post delete';
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }
}