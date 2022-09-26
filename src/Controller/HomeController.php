<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PersonnageRepository;
use App\Repository\TypeRepository;
use App\Entity\Personnage;
use App\Entity\Type;
use App\Entity\Competences;

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
    * @Route("/character/{id}", name="Personnage")
    */
    
    public function show_personnage(PersonnageRepository $repository, int $id): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 
        ]);
    }

    /**
    * @Route("/character/add", name="AddPersonnage")
    */
    
    public function add_personnage(PersonnageRepository $repository, int $id): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 
        ]);
    }

    /**
    * @Route("/character/{id}/edit", name="EditPersonnage")
    */
    
    public function edit_personnage(PersonnageRepository $repository, int $id): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 
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
    
    public function add_type(TypeRepository $repository): Response
    {
        $type = $repository->findAll();
        return $this->render('rpg/type.html.twig', [
            'types' => $type, 
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