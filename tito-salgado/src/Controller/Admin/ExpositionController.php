<?php

namespace App\Controller\Admin;

use App\Entity\Exposition;
use App\Form\ExpositionType;
use App\Repository\ExpositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin/expositions")
 */
class ExpositionController extends AbstractController
{
    /**
     * @Route(
     *     "/",
     *     name="admin.expositions.index",
     * )
     */
    public function index(ExpositionRepository $expositionsRepository): Response
    {
        $results = $expositionsRepository->findAll();
        return $this->render("admin/expositions/index.html.twig", [
            'expositions' => $results
        ]);
    }

    /**
     * @Route(
     *     "/form",
     *     name="admin.expositions.form",
     * )
     */

    public function form(Request $request, EntityManagerInterface $entityManager, int $id = null,
            ExpositionRepository $expositionsRepository): Response
    {
        $model = new Exposition();
        $type = ExpositionType::class;
        $form = $this->createForm($type, $model);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $entityManager->persist($model);
            $entityManager->flush();

            return $this->redirectToRoute('admin.expositions.index');
        }
        return $this->render("admin/expositions/form.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/form/remove/{id}", name="admin.oeuvres.remove")
     */
   /* public function remove(OeuvresRepository $oeuvresRepository, EntityManagerInterface $entityManager, 
            int $id):Response
    {
        $model = $oeuvresRepository->find($id);
        $entityManager->remove($model);
        $entityManager->flush();

        $this->addFlash('notice', "Le produit a été supprimé");
        return $this->redirectToRoute('admin.oeuvres.index');
        
    }*/
}