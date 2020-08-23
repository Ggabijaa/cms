<?php

namespace App\Controller;

use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em= $entityManager;
    }

    /**
     * @Route("/properties", name="property", methods={"GET"})
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function findAll()
    {
        $properties = $this->em->getRepository(Property::class)->findBy(['name' => 'name']);
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}
