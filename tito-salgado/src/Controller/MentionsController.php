<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MentionsController extends AbstractController
{

    /**
     * @Route("/mentions-legales", name="mentions.index")
     */
    public function index(): Response
    {
        return $this->render("mentions/index.html.twig");
    }

}