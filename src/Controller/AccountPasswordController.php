<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountPasswordController extends AbstractController
{
    /**
     * @Route("/compte/modifier-mdp", name="account_password")
     */
    public function index(): Response
    {
        return $this->render('account/password.html.twig', [
            'controller_name' => 'AccountPasswordController',
        ]);
    }
}
