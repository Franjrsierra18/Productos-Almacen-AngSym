<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DefaultController extends AbstractController
{

  /**
   * @Route("/", name="homepage")
   */

  public function indexAction(Request $request)
  {
    return $this->handleView($this->view(['status'=>'ok'], Response::HTTP_CREATED));
    // return $this->render('almacen/productList.html.twig');
  }

  // /**
  //  * @Route("/login", name="app_login")
  //  */
  // public function login(AuthenticationUtils $authenticationUtils)
  // {
  //   // get the login error if there is one
  //   $error = $authenticationUtils->getLastAuthenticationError();
  //   // last username entered by the user
  //   $lastUsername = $authenticationUtils->getLastUsername();
  //   // return $this->render('security/index.html.twig');
  //   return $this->handleView($this->view(['status' => 'ok']));
  // }
}
