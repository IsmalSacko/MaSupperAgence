<?php
namespace App\Controller;

// use App\Entity\Contact;
// use App\Form\ContactType;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController{

    /**
     * @Route("/blog", name="homepage")
     */
    public function home() :Response{
       return $this->render('blog.html.twig');
    }


      /**
     * Controlleur pour le formulaire de contrôleur
     * 
     * @Route("/contact",name="contact")
     */
    public function Contact(Request $request): Response{
        // $contact = new Contact();
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $contact= $form->getData();     //ici nous enverons le mail
        
    
     
      $this->addFlash('success', 'votre message a bien été envoyé !');
      return $this->redirectToRoute('homepage');
        }
        return $this->render('contact/contact.html.twig', [
            
            'form' => $form->createView(),     
            
            ]);
    }


    /**
     * Controlleur pour le jeu
     * 
     * @Route("/jeu",name="jeu")
     */
    public function jeu(): Response{
        
        return $this->render('jeu.html.twig');
    }    
}

