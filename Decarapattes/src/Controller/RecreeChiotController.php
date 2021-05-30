<?php

namespace App\Controller;

use App\Entity\RecreeChiot;
use App\Form\RecreeChiotType;
use App\Repository\RecreeChiotRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recree/chiot")
 */
class RecreeChiotController extends AbstractController
{
    /**
     * @Route("/", name="recree_chiot_index", methods={"GET"})
     */
    public function index(RecreeChiotRepository $recreeChiotRepository): Response
    {
        return $this->render('EnSavoirPlus/recree_chiot/index.html.twig', [
            'recree_chiots' => $recreeChiotRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="recree_chiot_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $recreeChiot = new RecreeChiot();
        $form = $this->createForm(RecreeChiotType::class, $recreeChiot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recreeChiot);
            $entityManager->flush();

            return $this->redirectToRoute('recree_chiot_index');
        }

        return $this->render('recree_chiot/new.html.twig', [
            'recree_chiot' => $recreeChiot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recree_chiot_show", methods={"GET"})
     */
    public function show(RecreeChiot $recreeChiot): Response
    {
        return $this->render('recree_chiot/show.html.twig', [
            'recree_chiot' => $recreeChiot,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="recree_chiot_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RecreeChiot $recreeChiot): Response
    {
        $form = $this->createForm(RecreeChiotType::class, $recreeChiot);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recree_chiot_index');
        }

        return $this->render('recree_chiot/edit.html.twig', [
            'recree_chiot' => $recreeChiot,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="recree_chiot_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RecreeChiot $recreeChiot): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recreeChiot->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($recreeChiot);
            $entityManager->flush();
        }

        return $this->redirectToRoute('recree_chiot_index');
    }
}
