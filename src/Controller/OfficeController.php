<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class OfficeController extends AbstractController
{
     /**
      * @Route("/", name="index"))
      */
    public function index(): Response
    {
        $userFirstName ="MYC14140918";
        return $this->render('shop/index.html.twig', [
            'user_first_name' => $userFirstName,
        ]);
    }
    
    /**
      * @Route("/services/", name="services"))
      */
      public function services(): Response
      {
          return $this->render('shop/services.html.twig');
      }
      
      /**
      * @Route("/contact/", name="contact"))
      */
      public function contact(): Response
      {
          return $this->render('shop/contact.html.twig');
      }

      /**
      * @Route("/about/", name="about"))
      */
      public function about(): Response
      {
          return $this->render('shop/about.html.twig');
      }

      /**
      * @Route("/product/", name="product"))
      */
      public function product(): Response
      {
          return $this->render('shop/product.html.twig');
      }

      /**
      * @Route("/single-shop/", name="single-shop"))
      */
      public function singleShop(): Response
      {
          return $this->render('shop/single.html.twig');
      }
    
}