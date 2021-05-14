<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Form\Type\UserType;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    /**
      * @Route("/new-user", name="new-user"))
      */
    public function new(Request $request): Response
    {
        // creates a user object and initializes some data for this example
        $user = new User();
        // $user->setTask('Write a blog post');
        // $user->setDueDate(new \DateTime('tomorrow'));

        //$form = $this->createForm(UserType::class, $user);
        
        $form = $this->createFormBuilder($user)
        ->add('email', TextType::Class)
        ->add('password', PasswordType::Class)
        ->add('roles', ChoiceType::class, [
            'multiple' => true,
            'choices'  =>  array
            (
                'ROLE_ADMIN' => array
                (
                    'Yes' => 'ROLE_ADMIN',
                ),
                'ROLE_SUPER_ADMIN' => array
                (
                    'Yes' => 'ROLE_SUPER_ADMIN'
                ),
                'ROLE_USER' => array
                (
                    'Yes' => 'ROLE_USER'
                ),
            ) ,
 
        ])
        ->add('save', SubmitType::class, ['label' => 'Create User'])
             ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$user` variable has also been updated
            $user = $form->getData();
    
            // ... perform some action, such as saving the user to the database
            // for example, if User is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($user);
             $entityManager->flush();
    
            return $this->redirectToRoute('index');
        }

        return $this->render('user/new.html.twig', [
                'form' => $form->createView(),
            ]);

    }
}