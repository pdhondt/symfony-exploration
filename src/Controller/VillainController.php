<?php

namespace App\Controller;

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
        $villain->setName('Thanos');
        $villain->setCostume('Golden armour');
        $villain->setBadness(5000);

        $this->getDoctrine()->getManager()->persist($villain);
        $this->getDoctrine()->getManager()->flush();

        return $this->render('villain/index.html.twig', [
            'controller_name' => 'VillainController',
        ]);
    }

    #[Route('/villain/{id}', name: 'villain_show')]
    public function detail($id)
    {
        $villain = $this->getDoctrine()->getRepository(Villain::class)->find($id);

        return $this->render('villain/show.html.twig', [
           'villain' => $villain,
        ]);

    }

}
