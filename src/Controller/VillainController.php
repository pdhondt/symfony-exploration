<?php

namespace App\Controller;

use App\Entity\Move;
use App\Entity\Villain;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VillainController extends AbstractController
{
    #[Route('/villain', name: 'villain')]
    public function index(): Response
    {
        $villain = new Villain();
        $villain->setName('Joker');
        $villain->setCostume('Clown costume');
        $villain->setBadness(1000);

        $move = new Move();
        $move->setName('Bombings');
        $villain->addMove($move);

        $move = new Move();
        $move->setName('Sending goons');
        $villain->addMove($move);

        $this->getDoctrine()->getManager()->persist($villain);
        $this->getDoctrine()->getManager()->flush();

        return $this->render('villain/index.html.twig', [
            'controller_name' => 'VillainController',
        ]);
    }

    #[Route('/villain/{villain}', name: 'villain_show')]
    public function detail(Villain $villain)
    {
        // $villain = $this->getDoctrine()->getRepository(Villain::class)->find($id);

        $villain->upBadness();

        $this->getDoctrine()->getManager()->flush();

        return $this->render('villain/show.html.twig', [
           'villain' => $villain,
        ]);

    }

}
