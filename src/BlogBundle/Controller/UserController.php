<?php

namespace BlogBundle\Controller;


use BlogBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController
{
    /**
     * Matches /users/*
     *
     * @Route("users/create/{id}/{username}/{password}", name="create_user", requirements={"id" = "\d+"})
     * @Method("POST")
     */
    public function createAction(Request $request) {
        $id = $request->get('id');
        $username = $request->get('username');
        $password = $request->get('password');
        $user = new User();
        $msg = $user->create($id, $username, $password);
        return new JsonResponse(array(
            'msg' => $msg
        ));
    }

    /**
     * Matches /users/*
     *
     * @Route("users/login/{id}/{username}/{password}", name="login_user", requirements={"id" = "\d+"})
     * @Method("POST")
     */
    public function loginAction(Request $request) {
        $id = $request->get('id');
        $username = $request->get('username');
        $password = $request->get('password');
        $user = new User();
        $msg = $user->login($id, $username, $password);
        return new JsonResponse(array(
            "msg", $msg
        ));
    }
}