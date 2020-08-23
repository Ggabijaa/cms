<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * @Route("/contact", name="contact", methods={"GET"})
     */
    public function findAll()
    {
        /**
         * @var $contacts Contact[]
         */
        $contacts = $this->em->getRepository(Contact::class)->findAll();
        $properties = $this->em->getRepository(Property::class)->findAll();

        $mappedContacts = [];
        foreach ($contacts as $contact) {
            $cid = $contact->getId();
            $mappedContacts[$cid] = ['id' => $cid];
            foreach ($properties as $property) {
                $mappedContacts[$cid]['properties'][] =
                    $contact->getContactPropertyValueByPropertyId($property->getId());
            }
        }

        return $this->render('contact/index.html.twig', [
            'contacts' => $mappedContacts,
            'properties' => $properties
        ]);
    }
}
