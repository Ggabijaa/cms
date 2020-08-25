<?php

namespace App\Controller;

use App\Entity\ContactProperty;
use App\Form\ContactPropertyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactPropertyController extends AbstractController
{
    private $em;

    /**
     * @Route("/contact/property", name="contact_property")
     */
    public function index()
    {
        return $this->render('contact_property/index.html.twig', [
            'controller_name' => 'ContactPropertyController',
        ]);
    }

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/contact/properties", name="contact")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function new(Request $request)
    {
        $contactProperty = new ContactProperty();
        $form = $this->createForm(ContactPropertyType::class, $contactProperty);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactProperty = $form->getData();
            $this->em->persist($contactProperty);
            $this->em->flush();

            return $this->redirectToRoute('contacts');
        }

        return $this->render('property/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
