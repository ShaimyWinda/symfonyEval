<?php

namespace App\Controller;

use App\Repository\ExpositionRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExpositionController extends AbstractController
{
    /**
     * @Route("/exposition", name="exposition.index")
     */
    public function index(ExpositionRepository $expositionRepository)
    {
        $expo = $expositionRepository->getExposition()->getResult();
        //dd($expo);

        return $this->render('exposition/index.html.twig', [
            'expositions' => $expo,
        ]);
    }
}
