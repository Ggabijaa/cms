<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\ContactProperty;
use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactPropertyType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('contact', EntityType::class, [
                'class' => Contact::class,
                'choice_label' => 'id'
            ])
            ->add('property', EntityType::class, [
                'class' => Property::class,
                'choice_label' => 'name'
            ])
            ->add('value', TextType::class)
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactProperty::class,
        ]);
    }
}
