<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PersonnageRepository;
use App\Repository\TypeRepository;
use App\Repository\CompetencesRepository;
use App\Entity\Personnage;
use App\Entity\Type;
use App\Entity\Competences;
use App\Form\PersonnageType;
use App\Form\CompetencesType;
use App\Form\TypesType;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
    * @Route("/home", name="Home")
    */
    
    public function index(PersonnageRepository $repository): Response
    {
        $personnages = $repository->findAll();
        
        return $this->render('rpg/home.html.twig', [
            'personnages' => $personnages, 
        ]);
    }

    /**
    * @Route("/character/add", name="AddPersonnage")
    */
    
    public function add_personnage(Request $request): Response
    {
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);


        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();

            return $this->redirectToRoute('Competences');
         }

        return $this->render('rpg/addpersonnage.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/add/2", name="Competences")
    */
    
    public function add_competences(Request $request): Response
    {
        $competence = new Competences();
        $form = $this->createForm(CompetencesType::class, $competence);
        $form->handleRequest($request);


        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competence);
            $em->flush();

            return $this->redirectToRoute('Home');
         }

        return $this->render('rpg/addpersonnagecompetences.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/{id}", name="Personnage")
    */
    
    public function show_personnage(PersonnageRepository $repository, int $id,CompetencesRepository $repository2): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        $competences = $repository2->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 'competences' => $competences
        ]);
    }

    /**
    * @Route("/character/{id}/edit", name="EditPersonnage")
    */
    
    public function edit_personnage(PersonnageRepository $repository, int $id): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $competence = new Competences();
        $form2 = $this->createForm(CompetencesType::class, $competence);
        return $this->render('rpg/editpersonnage.html.twig', [
            'form' => $form->createView(), 'form2' => $form2->createView(), 'personnages' => $personnages, 
        ]);
    }

    /**
    * @Route("/character/{id}/delete", name="DeletePersonnage")
    */
    
    public function delete_personnage(PersonnageRepository $repository, int $id): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 
        ]);
    }

    /**
    * @Route("/type", name="Type")
    */
    
    public function type(TypeRepository $repository): Response
    {
        $type = $repository->findAll();
        return $this->render('rpg/type.html.twig', [
            'types' => $type, 
        ]);
    }

    /**
    * @Route("/type/delete", name="DeleteType")
    */
    
    public function delete_type(TypeRepository $repository): Response
    {
        $type = $repository->findAll();
        return $this->render('rpg/type.html.twig', [
            'types' => $type, 
        ]);
    }
    

    /**
    * @Route("/type/add", name="AddType")
    */
    
    public function add_type(Request $request)
    {
        $type = new Type();
        $form = $this->createForm(TypesType::class, $type);
        $form->handleRequest($request);


        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('Type');
         }

        return $this->render('rpg/addtype.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/type/edit", name="EditType")
    */
    
    public function edit_type(TypeRepository $repository): Response
    {
        $type = $repository->findAll();
        return $this->render('rpg/type.html.twig', [
            'types' => $type, 
        ]);
    }
}