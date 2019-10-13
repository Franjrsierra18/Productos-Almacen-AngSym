<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class SecurityController extends AbstractController
{
    // /**
    //  * @Route("/login", name="app_login")
    //  */
    // public function login(AuthenticationUtils $authenticationUtils): Response
    // {
    //     // if ($this->getUser()) {
    //     //    $this->redirectToRoute('target_path');
    //     // }

    //     // get the login error if there is one
    //     $error = $authenticationUtils->getLastAuthenticationError();
    //     // last username entered by the user
    //     $lastUsername = $authenticationUtils->getLastUsername();

    //     // return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    //     return $this->handleView($this->view(['status'=>'ok'], Response::HTTP_CREATED));
    // }

    /**
     * @Route("/register", name="api_register", methods={"POST"})
     */
    public function register(ObjectManager $om, UserPasswordEncoderInterface $passwordEncoder, Request $request)
    {
        $user = new User();
        $email                  = $request->request->get("email");
        $password               = $request->request->get("password");
        $passwordConfirmation   = $request->request->get("password_confirmation");
        $errors = [];
        if ($password != $passwordConfirmation) {
            $errors[] = "Password does not match the password confirmation.";
        }
        if (strlen($password) < 6) {
            $errors[] = "Password should be at least 6 characters.";
        }
        if (!$errors) {
            $encodedPassword = $passwordEncoder->encodePassword($user, $password);
            $user->setEmail($email);
            $user->setPassword($encodedPassword);
            $om->persist($user);
            $om->flush();
            return $this->json([
                'user' => $user
            ]);
        }

        return $this->json([
            'errors' => $errors
        ], 400);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
