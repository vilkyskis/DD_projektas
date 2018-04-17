<?php

namespace App\Controller;
// src/Controller/DefaultController.php
// ...

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="root_path")
     */
    public function RedirectToLogin()
    {
        return $this->redirect("login");
    }

    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

    /**
     * @Route("/profile")
     */
    public function profile()
    {
        return new Response('<html><body><profile></profile> page!</body></html>');
    }
}