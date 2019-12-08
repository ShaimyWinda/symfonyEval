<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\Model\ContactModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact.index")
     */
    public function index(Request $request):Response
    {
        $type = ContactType::class;
        $model = new ContactModel();

        $form = $this->createForm($type, $model);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $result = $form->getData();
            $firstname = $result->getFirstname();
            $message = $result->getMessage();
            $this->addFlash('notice', 'Email envoyé');
            return $this->redirectToRoute('contact.index');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
