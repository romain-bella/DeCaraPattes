<?php

namespace App\Controller;

use App\Entity\Laisse;
use App\Form\LaisseType;
use App\Repository\LaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/laisse")
 */
class LaisseController extends AbstractController
{
    /**
     * @Route("/", name="laisse_index", methods={"GET"})
     */
    public function index(LaisseRepository $laisseRepository): Response
    {
        return $this->render('laisse/index.html.twig', [
            'laisses' => $laisseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="laisse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $laisse = new Laisse();
        $form = $this->createForm(LaisseType::class, $laisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($laisse);
            $entityManager->flush();

            return $this->redirectToRoute('laisse_index');
        }

        return $this->render('laisse/new.html.twig', [
            'laisse' => $laisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laisse_show", methods={"GET"})
     */
    public function show(Laisse $laisse): Response
    {
        return $this->render('laisse/show.html.twig', [
            'laisse' => $laisse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="laisse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Laisse $laisse): Response
    {
        $form = $this->createForm(LaisseType::class, $laisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('laisse_index');
        }

        return $this->render('laisse/edit.html.twig', [
            'laisse' => $laisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laisse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Laisse $laisse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laisse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($laisse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('laisse_index');
    }
}
