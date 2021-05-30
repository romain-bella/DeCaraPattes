<?php

namespace App\Controller;

use App\Entity\Collier;
use App\Form\CollierType;
use App\Repository\CollierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collier")
 */
class CollierController extends AbstractController
{
    /**
     * @Route("/", name="collier_index", methods={"GET"})
     */
    public function index(CollierRepository $collierRepository): Response
    {
        return $this->render('collier/index.html.twig', [
            'colliers' => $collierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="collier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $collier = new Collier();
        $form = $this->createForm(CollierType::class, $collier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($collier);
            $entityManager->flush();

            return $this->redirectToRoute('collier_index');
        }

        return $this->render('collier/new.html.twig', [
            'collier' => $collier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="collier_show", methods={"GET"})
     */
    public function show(Collier $collier): Response
    {
        return $this->render('collier/show.html.twig', [
            'collier' => $collier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="collier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Collier $collier): Response
    {
        $form = $this->createForm(CollierType::class, $collier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('collier_index');
        }

        return $this->render('collier/edit.html.twig', [
            'collier' => $collier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="collier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Collier $collier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($collier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('collier_index');
    }
}
