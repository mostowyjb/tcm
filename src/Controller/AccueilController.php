<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="acceuil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/position", name="position")
     */
    public function position()
    {
        return $this->render('accueil/position.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/tournoi", name="tournoi")
     */
    public function tournoi()
    {
        return $this->render('accueil/tournoi.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/direct", name="direct")
     */
    public function direct()
    {
        return $this->render('accueil/direct.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservation()
    {
        return $this->render('accueil/reservation.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

    /**
     * @Route("/utilisateur", name="utilisateur")
     */
    public function utilisateur()
    {
        return $this->render('accueil/utilisateur.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }

}
