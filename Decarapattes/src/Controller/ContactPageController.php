<?php

namespace App\Controller;

use App\Entity\ContactPage;
use App\Form\ContactPageType;
use App\Repository\ContactPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contact")
 */
class ContactPageController extends AbstractController
{
    /**
     * @Route("/", name="contact")
     */
    public function indexContact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactPageType::class);
        $form->handleRequest($request);// on récupère le formulaire si y a pas de formulaire il passe directement a la fin

        if ($form->isSubmitted() && $form->isValid()) {//pour vérifier si le formulaire si il a était envoyer
            $contact = $form->getData();

            $message = (new \Swift_Message('Nouveau contact'))
                // On attribue l'expéditeur
                ->setFrom('contactdecarapattes@gmail.com')

                // On attribue le destinataire
                ->setTo('loick.palleja@outlook.fr')

                // On crée le texte avec la vue
                ->setBody(
                    $this->renderView(
                        'EmailContact/contacter.html.twig', compact('contact')
                    ),
                    'text/html' //type de text ici html
                )
            ;
            //on envoie le message
            $mailer->send($message);
            
            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
           
        }
        return $this->render('contact_page/index.html.twig',['ContactForm' => $form->createView()]);
    }
    

    /**
     * @Route("/contact", name="contactIndex", methods={"GET"})
     */
    /*public function index(ContactPageRepository $contactPageRepository): Response
    {
        return $this->render('contact_page/index.html.twig', [
            'contact_pages' => $contactPageRepository->findAll(),
        ]);
    }*/

    

   
}
