<?php

namespace App\Controller;

use App\Repository\OeuvresRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesController extends AbstractController
{

    /**
     * @Route("/categories", name="categories.index")
     */
    public function index(OeuvresRepository $oeuvreRepository): Response
    {
        $peinture = $oeuvreRepository->getByCategories(1)->getResult();
        $sculpture = $oeuvreRepository->getByCategories(2)->getResult();
        $dessin = $oeuvreRepository->getByCategories(3)->getResult();

        return $this->render("categories/index.html.twig", [
            'peintures' => $peinture,
            'sculptures' => $sculpture,
            'dessins' => $dessin
        ]);
    }
    /**
     * @Route("/categories/details-{id}", name="categories.details")
     */
    public function details(OeuvresRepository $oeuvreRepository, int $id): Response
    {
        $product = $oeuvreRepository->getDetailsProduct($id)->getResult();

        return $this->render("categories/details.html.twig", [
            'products' => $product,
        ]);
    }

    /**
     * @Route("/categories/{id}", name="categories.category")
     */
    public function category(OeuvresRepository $oeuvreRepository, int $id): Response
    {
        $category = $oeuvreRepository->getByCategories($id)->getResult();

        return $this->render("categories/category.html.twig", [
            'categories' => $category,
        ]);
    }

}