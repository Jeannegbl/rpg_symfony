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
    
    public function index(PersonnageRepository $repository, TypeRepository $repository2): Response
    {
        $personnages = $repository->findAll();
        $type = $repository2->findAll();
        return $this->render('rpg/home.html.twig', [
            'personnages' => $personnages,
            'types' => $type
        ]);
    }
    public function __toString()
    {
        return (string) $this->getType();
    }
}