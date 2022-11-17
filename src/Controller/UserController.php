<?php

 namespace App\Controller;

 use App\Entity\Utilisateur;
 use Doctrine\ORM\Persistence;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;
 use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
 #[Route(path: '/login', name: 'app_login')]
 public function new(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
 {
    $utilisateur = new Utilisateur();
    $form = $this->createForm(UtilisateurType::class, $utilisateur);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager = $k;
    }
 }
}