<?php
namespace App\Controller;

 use App\Entity\Utilisateur;
 use Doctrine\ORM\Persistence\EntityManager;
 use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
 use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
 #[Route(path: '/login', name: 'app_login')]
 public function new(Request $request, UserPasswordHasherInterface $passwordEncoder): Response
 {
    $utilisateur = new Utilisateur();
    $form = $this->createForm(UtilisateurType::class, $utilisateur);
    $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $utilisateur->setPassword(
            $passwordEncoder->hashPassword($utilisateur, $utilisateur->getPassword()));
        $entityManager->persist($utilisateur);
        $entityManager->flush();

        return $this->redirectToRoute('utilisateur_index');
    }

    return $this->render('utilisateur/new.html.twig', [
        'utilisateur' => $utilisateur,
        'form' => $form->createView(),
    ]);
 }
}