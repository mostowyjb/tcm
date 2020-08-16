<?php

namespace App\Controller;
use App\Entity\User;
use App\Entity\Player;
use App\Entity\TournoiMatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;

class AccueilController extends AbstractController
{
  private $em;
  public function __construct(\Doctrine\ORM\EntityManagerInterface $em)
  {
      $this->em = $em;
  }
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
     * @Route("/newMatch", name="newMatch")
     */
    public function newMatch(\Symfony\Component\HttpFoundation\Request $request)
    {
      $nomA=$request->get('nomA');
      $prenomA=$request->get('prenomA');
      
      $nomB=$request->get('nomB');
      $prenomB=$request->get('prenomB');
      
      $nomC=$request->get('nomC');
      $prenomC=$request->get('prenomC');

      $nomD=$request->get('nomD');
      $prenomD=$request->get('prenomD');

      $sapa=$request->get('sapa');
      $sapb=$request->get('sapb');
      
      $sbpa=$request->get('sbpa');
      $sbpb=$request->get('sbpb');
      
      $scpa=$request->get('scpa');
      $scpb=$request->get('scpb');

      $category=$request->get('category');
      $date=$request->get('date');
      $time=$request->get('time');
      $datetime= new DateTime();
      $datetime=$date;
      
      $repository=$this->getDoctrine()->getRepository(Player::class);
      $p1=$repository->findOneBy(['nom' => $nomA ,'prenom' => $prenomA]);
      $p2=$repository->findOneBy(['nom' => $nomB ,'prenom' => $prenomB]);
      $p3=$repository->findOneBy(['nom' => $nomC ,'prenom' => $prenomC]);
      $p4=$repository->findOneBy(['nom' => $nomD ,'prenom' => $prenomD]);
      if($p1!=NULL && $p2!=NULL)
      {
        $tmD= new TournoiMatch();
        $tmD->setDate($datetime);
        $tmD->setCategory($category);
        $tmD->setIdPlayerA($p1);
        $tmD->setIdPlayerB($p2);
        if($p3!=NULL && $p4!=NULL)
        {
          $tmD->setIdPlayerC($p3);
          $tmD->setIdPlayerD($p4);
        }
        $tmD->setPrenom($prenom);
        $tmD->setClub($club);
        $tmD->setClassement($classement);

        $this->em=$this->getDoctrine()->getManager();
        $this->em->persist($tmD);
        $this->em->flush();
        return $this->redirectToRoute('player');
    }
  }

    /**
     * @Route("/deleteMatch/{$idmatch}", name="deleteMatch")
     */
    public function deleteMatch($idmatch)
    {

      $repository=$this->getDoctrine()->getRepository(TournoiMatch::class);
      $res=$repository->findOneBy(['id' => $idmatch]);

      $match= new TournoiMatch();
      $match=$res;

      $this->em=$this->getDoctrine()->getManager();
      $this->em->remove($match);
      $this->em->flush();

        return $this->redirectToRoute('player');
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

      $repository=$this->getDoctrine()->getRepository(User::class);
        $res=$repository->findAll();

        return $this->render('accueil/utilisateur.html.twig', [
            'controller_name' => 'AcceuilController',
            'resU' =>  $res,
        ]);
    }

    /**
     * @Route("/newUser", name="newUser")
     */
    public function newUser(\Symfony\Component\HttpFoundation\Request $request)
    {

      $nom=$request->get('nom');
      $prenom=$request->get('prenom');
      $login=$request->get('login');
      $mdp=$request->get('mdp');
      if($nom!=NULL && $prenom!=NULL && $login!=NULL && $mdp!=NULL)
      {
      $user= new User();
      $user->setNom($nom);
      $user->setPrenom($prenom);
      $user->setLogin($login);
      $user->setMdp($mdp);

      $this->em=$this->getDoctrine()->getManager();
      $this->em->persist($user);
      $this->em->flush();
      }
        return $this->redirectToRoute('utilisateur');
    }

    /**
     * @Route("/deleteUser/{iduser}", name="deleteUser")
     */
    public function deleteUser($iduser)
    {

      $repository=$this->getDoctrine()->getRepository(User::class);
      $res=$repository->findOneBy(['id' => $iduser]);

      $user= new User();
      $user=$res;

      $this->em=$this->getDoctrine()->getManager();
      $this->em->remove($user);
      $this->em->flush();

        return $this->redirectToRoute('utilisateur');
    }

    /**
     * @Route("/modifyUser/{iduser}", name="modifyUser")
     */
    public function modifyUser($iduser)
    {

      $repository=$this->getDoctrine()->getRepository(User::class);
      $res=$repository->findOneBy(['id' => $iduser]);

      $user= new User();
      $user=$res;

      return $this->render('accueil/modifutilisateur.html.twig', [
          'controller_name' => 'AcceuilController',
          'user' =>  $user,
      ]);
    }

    /**
     * @Route("/vmodifyUser", name="vmodifyUser")
     */
    public function vmodifyUser(\Symfony\Component\HttpFoundation\Request $request)
    {
      $nom=$request->get('nom');
      $prenom=$request->get('prenom');
      $login=$request->get('login');
      $mdp=$request->get('mdp');

      $repository=$this->getDoctrine()->getRepository(User::class);
      $res=$repository->findOneBy(['nom' => $nom, 'prenom' => $prenom]);

      $user=$res;

      $user->setNom($nom);
      $user->setPrenom($prenom);
      $user->setLogin($login);
      $user->setMdp($mdp);

      $this->em=$this->getDoctrine()->getManager();
      $this->em->flush();

      return $this->redirectToRoute('utilisateur');
    }


    /**
     * @Route("/player", name="player")
     */
    public function player()
    {

      $repository=$this->getDoctrine()->getRepository(Player::class);
        $res=$repository->findAll();

        return $this->render('accueil/player.html.twig', [
            'controller_name' => 'AcceuilController',
            'resP' =>  $res,
        ]);
    }

    /**
     * @Route("/newPlayer", name="newPlayer")
     */
    public function newPlayer(\Symfony\Component\HttpFoundation\Request $request)
    {

      $nom=$request->get('nom');
      $prenom=$request->get('prenom');
      $club=$request->get('club');
      $classement=$request->get('classement');
      if($nom!=NULL && $prenom!=NULL && $club!=NULL && $classement!=NULL)
      {
      $player= new Player();
      $player->setNom($nom);
      $player->setPrenom($prenom);
      $player->setClub($club);
      $player->setClassement($classement);

      $this->em=$this->getDoctrine()->getManager();
      $this->em->persist($player);
      $this->em->flush();
      }
        return $this->redirectToRoute('player');
    }

    /**
     * @Route("/deletePlayer/{$idplayer}", name="deletePlayer")
     */
    public function deletePlayer($idplayer)
    {

      $repository=$this->getDoctrine()->getRepository(Player::class);
      $res=$repository->findOneBy(['id' => $idplayer]);

      $player= new Player();
      $player=$res;

      $this->em=$this->getDoctrine()->getManager();
      $this->em->remove($player);
      $this->em->flush();

        return $this->redirectToRoute('player');
    }

    /**
     * @Route("/modifyPlayer/{idplayer}", name="modifyPlayer")
     */
    public function modifyPlayer($idplayer)
    {

      $repository=$this->getDoctrine()->getRepository(Player::class);
      $res=$repository->findOneBy(['id' => $idplayer]);

      $player= new Player();
      $player=$res;

      return $this->render('accueil/modifyPlayer.html.twig', [
          'controller_name' => 'AcceuilController',
          'player' =>  $player,
      ]);
    }

    /**
     * @Route("/vmodifyPlayer", name="vmodifyPlayer")
     */
    public function vmodifyPlayer(\Symfony\Component\HttpFoundation\Request $request)
    {
      $nom=$request->get('nom');
      $prenom=$request->get('prenom');
      $club=$request->get('club');
      $classement=$request->get('classement');

      $repository=$this->getDoctrine()->getRepository(Player::class);
      $res=$repository->findOneBy(['nom' => $nom, 'prenom' => $prenom]);

      $player=$res;

      $player->setNom($nom);
      $player->setPrenom($prenom);
      $player->setClub($club);
      $player->setClassement($classement);

      $this->em=$this->getDoctrine()->getManager();
      $this->em->flush();

      return $this->redirectToRoute('player');
    }



    /**
     * @Route("/denied", name="denied")
     */
    public function denied() {
        return $this->redirect('/');
    }


}
