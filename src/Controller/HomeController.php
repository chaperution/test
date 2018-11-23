<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Entity\Product;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(ProductRepository $repo)
    {

    	$products = $repo->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products
        ]);
    }

    /**
     * @Route("/{id}", name="show_product")
     */
    public function showProduct(Product $product) {

    	return $this->render('home/show.html.twig', [
    		'product' => $product
    	]);
    }

}
