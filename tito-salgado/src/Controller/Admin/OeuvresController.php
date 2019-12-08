<?php

namespace App\Controller\Admin;

use App\Entity\Oeuvres;
use App\Form\OeuvresType;
use App\Service\FileService;
use App\Repository\OeuvresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/admin/oeuvres")
 */
class OeuvresController extends AbstractController
{
    /**
     * @Route(
     *     "/",
     *     name="admin.oeuvres.index",
     * )
     */
    public function index(OeuvresRepository $oeuvresRepository): Response
    {
        $results = $oeuvresRepository->getAll()->getResult();
        return $this->render("admin/oeuvres/index.html.twig", [
            'oeuvres' => $results
        ]);
    }

    /**
     * @Route(
     *     "/form",
     *     name="admin.oeuvres.form",
     * )
     * @Route(
     *     "/form/update/{id}",
     *     name="admin.oeuvres.form.update",
     * )
     */

    public function form(Request $request, EntityManagerInterface $entityManager, int $id = null, OeuvresRepository $oeuvresRepository): Response
    {
        $model = $id ? $oeuvresRepository->find($id) : new Oeuvres();
        $type = OeuvresType::class;
        $form = $this->createForm($type, $model);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $model->getId() ? "Le produit a été modifié" : "Le produit a été ajouté";
            $this->addFlash('notice', $message);

            $model->getId() ? null : $entityManager->persist($model);
            $entityManager->flush();

            return $this->redirectToRoute('admin.oeuvres.index');
        }
        return $this->render("admin/oeuvres/form.html.twig", [
            'form' => $form->createView(),
            'id'=> $id
        ]);
    }

    /**
     * @Route("/form/remove/{id}", name="admin.oeuvres.remove")
     */
    public function remove(OeuvresRepository $oeuvresRepository, EntityManagerInterface $entityManager, 
            int $id):Response
    {
        $model = $oeuvresRepository->find($id);
        $entityManager->remove($model);
        $entityManager->flush();

        $this->addFlash('notice', "Le produit a été supprimé");
        return $this->redirectToRoute('admin.oeuvres.index');
        
    }
}