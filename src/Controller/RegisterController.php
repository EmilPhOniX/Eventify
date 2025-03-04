<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function index(): Response
    {
        return $this->render('user/inscription.html.twig', [
            'controller_name' => 'RegisterController',
        ]);
    }

    // #[Route('/connexion', name: 'app_login')]
    // public function login(): Response
    // {
    //     return $this->render('user/connexion.html.twig', [
    //         'controller_name' => 'RegisterController',
    //     ]);
    // }
}
