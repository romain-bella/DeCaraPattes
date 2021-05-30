<?php

namespace App\Controller;

use App\Entity\OptionLaisse;
use App\Form\OptionLaisseType;
use App\Repository\OptionLaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/option/laisse")
 */
class OptionLaisseController extends AbstractController
{
    /**
     * @Route("/", name="option_laisse_index", methods={"GET"})
     */
    public function index(OptionLaisseRepository $optionLaisseRepository): Response
    {
        return $this->render('option_laisse/index.html.twig', [
            'option_laisses' => $optionLaisseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="option_laisse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $optionLaisse = new OptionLaisse();
        $form = $this->createForm(OptionLaisseType::class, $optionLaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($optionLaisse);
            $entityManager->flush();

            return $this->redirectToRoute('option_laisse_index');
        }

        return $this->render('option_laisse/new.html.twig', [
            'option_laisse' => $optionLaisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_laisse_show", methods={"GET"})
     */
    public function show(OptionLaisse $optionLaisse): Response
    {
        return $this->render('option_laisse/show.html.twig', [
            'option_laisse' => $optionLaisse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="option_laisse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OptionLaisse $optionLaisse): Response
    {
        $form = $this->createForm(OptionLaisseType::class, $optionLaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('option_laisse_index');
        }

        return $this->render('option_laisse/edit.html.twig', [
            'option_laisse' => $optionLaisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_laisse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OptionLaisse $optionLaisse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optionLaisse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($optionLaisse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('option_laisse_index');
    }
}
