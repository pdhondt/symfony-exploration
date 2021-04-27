<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $name = 'Peter';
        $gender = 'M';
        $hobbies = ['Cycling', 'Snowboarding', 'Coding'];

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'name' => $name,
            'gender' => $gender,
            'hobbies' => $hobbies
        ]);
    }

    #[Route('/info', name: 'info')]
    public function info(): Response
    {
        return $this->render('/home/info.html.twig', [

        ]);

    }
}
