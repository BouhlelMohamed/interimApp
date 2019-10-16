<?php

namespace App\Form;

use App\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EmployeeType extends AbstractType
{

    private function getConfiguration($label,$placeholder = NULL)
    {
        return [
            'label' =>  $label,
            'attr'  =>  [
                'placeholder'   =>  $placeholder
            ]
        ];
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName', TextType::class, $this->getConfiguration("Nom de famille", 'Exemple : Dupont etc...'))
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom", 'Exemple : Nicolas etc...'))
            ->add('birthDate', DateType::class, $this->getConfiguration("Date de naissance"))
            ->add('nationality', TextType::class, $this->getConfiguration("Nationalité", 'Exemple : Francais Turque etc...'))
            ->add('phoneNumber', TelType::class, $this->getConfiguration("Numéro de Téléphone", 'Exemple : 07.08.88.88.99'))
            ->add('mail', EmailType::class, $this->getConfiguration("Adresse Email", 'Exemple : dupont@mail.fr'))
            ->add('caces',TextType::class, $this->getConfiguration("Caces", 'Exemple : C1,C2,C3,C5'))
            ->add('comment', TextareaType::class, $this->getConfiguration("Commentaires",'Exemple : Pas de Rib, Paiement par chéque'))
            ->add('save', SubmitType::class,[
                'label' =>  'Crée la fiche intérimaire',
                'attr'  => ['class' => 'btn btn-primary']
                ])

            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}
