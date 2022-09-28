<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\PersonnageRepository;
use App\Repository\TypeRepository;
use App\Repository\CompetencesRepository;
use App\Repository\AvatarRepository;
use App\Entity\Personnage;
use App\Entity\Type;
use App\Entity\Competences;
use App\Entity\Avatar;
use App\Form\PersonnageType;
use App\Form\CompetencesType;
use App\Form\TypesType;
use App\Form\AvatarType;

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

            return $this->redirectToRoute('AddCompetences');
         }

        return $this->render('rpg/addpersonnage.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/add/2", name="AddCompetences")
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

            return $this->redirectToRoute('Personnage', ['id' => $competence->getId()]);
         }

        return $this->render('rpg/addpersonnagecompetences.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/test", name="AddAvatar")
    */
    
    public function add_avatar(Request $request): Response
    {
        $avatar = new Avatar();
        $form = $this->createForm(AvatarType::class, $avatar);
        $form->handleRequest($request);


        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($avatar);
            $em->flush();

            return $this->redirectToRoute('Personnage', ['id' => $avatar->getId()]);
         }

        return $this->render('rpg/addpersonnageavatar.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/{id}", name="Personnage")
    */
    
    public function show_personnage(PersonnageRepository $repository, int $id,CompetencesRepository $repository2, AvatarRepository $repository3): Response
    {
        $personnages = $repository->findBy(array('id' => $id));
        $competences = $repository2->findBy(array('id' => $id));
        $avatars = $repository3->findBy(array('id' => $id));
        return $this->render('rpg/showpersonnage.html.twig', [
            'personnages' => $personnages, 'competences' => $competences, 'avatars' => $avatars
        ]);
    }

    /**
    * @Route("/character/edit/{id}", name="EditPersonnage")
    */
    
    public function edit_personnage(Personnage $personnage, Request $request)
    {
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnage);
            $em->flush();

            return $this->redirectToRoute('EditCompetences', ['id' => $personnage->getId()]);
         }

        return $this->render('rpg/editpersonnage.html.twig', [
            'form' => $form->createView(),
        ]);
    }

        /**
    * @Route("/character/edit/{id}/2", name="EditCompetences")
    */
    
    public function edit_competences(Competences $competences, Request $request)
    {
        $form = $this->createForm(CompetencesType::class, $competences);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competences);
            $em->flush();

            return $this->redirectToRoute('Personnage', ['id' => $competences->getId()]);
         }

        return $this->render('rpg/editpersonnagecompetences.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
    * @Route("/character/delete/{id}", name="DeletePersonnage")
    */
    
    public function delete_personnage(Personnage $personnage, PersonnageRepository $repository)
    {
        $transferid = $repository->find($personnage)->getId($personnage);
        $em = $this->getDoctrine()->getManager();
        $em->remove($personnage);
        $em->flush();
        return $this->redirectToRoute('DeleteCompetences', ['id' => $transferid]);
    }

    /**
    * @Route("/character/delete/{id}/2", name="DeleteCompetences")
    */
    
    public function delete_competences(Competences $competence, CompetencesRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($competence);
        $em->flush();
        return $this->redirectToRoute('Home'); 
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
    * @Route("/type/delete/{id}", name="DeleteType")
    */
    
    public function delete_type(Type $id, TypeRepository $repository)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($id);
        $em->flush();
        return $this->redirectToRoute('Type'); 
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
    * @Route("/type/edit/{id}", name="EditType")
    */
    
    public function edit_type(Type $type, Request $request)
    {
        $form = $this->createForm(TypesType::class, $type);
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($type);
            $em->flush();

            return $this->redirectToRoute('Type');
         }

        return $this->render('rpg/edittype.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}