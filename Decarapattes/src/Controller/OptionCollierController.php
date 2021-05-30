<?php

namespace App\Controller;

use App\Entity\OptionCollier;
use App\Form\OptionCollierType;
use App\Repository\OptionCollierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/option/collier")
 */
class OptionCollierController extends AbstractController
{
    /**
     * @Route("/", name="option_collier_index", methods={"GET"})
     */
    public function index(OptionCollierRepository $optionCollierRepository): Response
    {
        return $this->render('option_collier/index.html.twig', [
            'option_colliers' => $optionCollierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="option_collier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $optionCollier = new OptionCollier();
        $form = $this->createForm(OptionCollierType::class, $optionCollier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($optionCollier);
            $entityManager->flush();

            return $this->redirectToRoute('option_collier_index');
        }

        return $this->render('option_collier/new.html.twig', [
            'option_collier' => $optionCollier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_collier_show", methods={"GET"})
     */
    public function show(OptionCollier $optionCollier): Response
    {
        return $this->render('option_collier/show.html.twig', [
            'option_collier' => $optionCollier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="option_collier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, OptionCollier $optionCollier): Response
    {
        $form = $this->createForm(OptionCollierType::class, $optionCollier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('option_collier_index');
        }

        return $this->render('option_collier/edit.html.twig', [
            'option_collier' => $optionCollier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="option_collier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, OptionCollier $optionCollier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$optionCollier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($optionCollier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('option_collier_index');
    }
}
