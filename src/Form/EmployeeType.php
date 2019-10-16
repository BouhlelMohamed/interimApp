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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
            ->add('manOurWomen', ChoiceType::class, [
                'choices'   =>  [
                    'Mme'   =>  "Mme",
                    'M'     =>  "M",
                ],
                'label' => 'Madame/Monsieur :',


            ])
            ->add('lastName', TextType::class, $this->getConfiguration("Nom de famille :", 'Exemple : Dupont etc...'))
            ->add('firstName', TextType::class, $this->getConfiguration("Prénom :", 'Exemple : Nicolas etc...'))
            ->add('identifiant', TextType::class)

            ->add('birthDate', DateType::class, $this->getConfiguration("Date de naissance :"))
            ->add('nationality', CountryType::class, $this->getConfiguration("Nationalité :"))
           
            ->add('phoneNumber', TelType::class, $this->getConfiguration("Numéro de Téléphone :", 'Exemple : 07.08.88.88.99'))
            ->add('mail', EmailType::class, $this->getConfiguration("Adresse Email :", 'Exemple : dupont@mail.fr'))
            
            ->add('adress', TextType::class, $this->getConfiguration("Adresse :",'Exemple : 95 Rue de la fontaine'))
            ->add('zipCode', NumberType::class, $this->getConfiguration("Code Postal :", "Exemple : 75000"))
            ->add('city', TextType::class, $this->getConfiguration("Ville :",'Exemple : Paris'))
            
            ->add('typeContrat', ChoiceType::class, [
                'choices'   =>  [
                    'Intérim'   =>  'Intérim',
                    'CDD'   =>  "CDD",
                    'CDI'   =>  "CDI"

                ],
                'label' =>  'Contrat :'
            ])
            ->add('fonction', ChoiceType::class, [
                'choices'   =>  [
                    'Cariste'     =>  "Cariste",
                    'Rouleur'        =>  "Rouleur",
                    'Chargeur/Déchargeur'        =>  "Chargeur/Déchargeur",
                    'Préparateur de commandes'   =>  "Préparateur de commandes",
                    'Inventoriste'   =>  "Inventoriste",
                    'Contrôleur'     =>  "Contrôleur",
                    "Chef d'équipe"  =>  "Chef d'équipe"

                ],
                'label' =>  'Fonction :'
            ])  
            ->add('caces',ChoiceType::class, [
                'choices'  => [
                    'C1' => "C1",
                    'C3' => "C3",
                    'C5' => "C5",
                    'C1,C3,C5' => "C1,C3,C5",
                    'C1,C2,C3,C4,C5' => "C1,C2,C3,C4,C5",

                ],
            ])          
            ->add('startDate', DateType::class, $this->getConfiguration("Date entrée :"))
            ->add('endDate', DateType::class, $this->getConfiguration("Date sortie : "))

            
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
