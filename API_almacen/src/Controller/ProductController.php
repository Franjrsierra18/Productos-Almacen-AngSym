<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

// use App\Form\Type\ProductType;

/**
 * Product controller.
 * @Route("/api", name="api_")
 */

class ProductController extends FOSRestController
{
    /**
     * List all Products.
     * @Rest\Get("/products")
     * 
     * @return Response
     */
    public function getProductsAction()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findall();
        return $this->handleView($this->view($products));
    }
    /**
     * Create Product.
     * @Rest\Post("/product")
     * 
     * @return Response
     */
    public function postProductAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            return $this->handleView($this->view(['status'=>'ok'], Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * @Rest\Post("/login")
     * @return View
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //    $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
        return $this->handleView($this->view(['status'=>'ok'], Response::HTTP_CREATED));
    }

    // /**
    //  * Creates an Article resource
    //  * @Rest\Post("/login")
    //  * @param Request $request
    //  * @return View
    //  */
    // public function postLogin(Request $request): View
    // {
    //     $user = new Article();
    //     $article->setTitle($request->get('title'));
    //     $article->setContent($request->get('content'));
    //     $this->articleRepository->save($article);
    //     // In case our POST was a success we need to return a 201 HTTP CREATED response
    //     return View::create($article, Response::HTTP_CREATED);
    // }
}
