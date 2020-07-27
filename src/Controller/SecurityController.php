<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils ;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends AbstractController
{
      /**
       *@Route("/connexion", name= "security_login")
       */
      public function login(Request $request , AuthenticationUtils $authenticationUtils)
      {
          $error = $authenticationUtils->getLastAuthenticationError();
         $lastUsername = $authenticationUtils->getLastUsername();
         return $this->render(
                 'security/login.html.twig', [
                     'last_username' => $lastUsername,
                      'error' => $error
                 ]
                 );
      }

      /**
       *@Route("/deconnexion", name= "security_logout")
       */
      public function logout() {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
      }

}
