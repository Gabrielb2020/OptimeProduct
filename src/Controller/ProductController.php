<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Product;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\RegisterType;

class ProductController extends AbstractController
{
    public function register(request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);

        $product = new Product();
        $form = $this->createForm(RegisterType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $product = $form->getData();
            $category = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('register');
        }
        

        return $this->render('product/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(int $id){

        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName();
        $entityManager->flush();

        return $this->redirectToRoute('products', [
            'id' => $product->getId()
        ]);
    }
    

    public function delete(int $id){

        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        $entityManager->remove($product);
        $entityManager->flush();
    }
   
}
