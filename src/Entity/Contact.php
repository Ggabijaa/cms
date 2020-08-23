<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=ContactProperty::class, mappedBy="contact", orphanRemoval=true)
     */
    private $contactProperties;

    public function __construct()
    {
        $this->contactProperties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ContactProperty[]
     */
    public function getContactProperties(): Collection
    {
        return $this->contactProperties;
    }

    public function addContactProperty(ContactProperty $contactProperty): self
    {
        if (!$this->contactProperties->contains($contactProperty)) {
            $this->contactProperties[] = $contactProperty;
            $contactProperty->setContact($this);
        }

        return $this;
    }

    public function removeContactProperty(ContactProperty $contactProperty): self
    {
        if ($this->contactProperties->contains($contactProperty)) {
            $this->contactProperties->removeElement($contactProperty);
            // set the owning side to null (unless already changed)
            if ($contactProperty->getContact() === $this) {
                $contactProperty->setContact(null);
            }
        }

        return $this;
    }
}
