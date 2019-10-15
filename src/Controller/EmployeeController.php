<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeeController extends AbstractController
{
    /**
     * @Route("/create", name="create_employee")
     */
    public function create(Request $request,ObjectManager $manager)
    {
        $employee = new Employee;

        $form = $this->createForm(EmployeeType::class,$employee);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($employee);
            $manager->flush();

            $this->addFlash(
                'success',
                "L'intérimaire a bien été enregistré"
            );
            
            return $this->redirectToRoute('show_employee');

        }else
        {
            $this->addFlash(
                'danger',
                "L'intérimaire n'est pas enregistré !!!!"
            );
        }
        

        return $this->render('employee/create.html.twig', [
            'form'      => $form->createView()
        ]);
    }

    /**
     * Show Employee
     * @Route("/show", name="show_employee")
     * @param EmployeeRepository $repo
     */
    public function show(EmployeeRepository $repo)
    {
        $employee = new Employee;

        $employees = $repo->findAll();

        return $this->render('employee/show.html.twig', [
            'employees' =>  $employees
        ]);
    }
}
