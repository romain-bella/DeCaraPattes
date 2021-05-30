<?php

namespace App\Controller;

use App\Entity\BilanComportemental;
use App\Form\BilanComportementalType;
use App\Repository\BilanComportementalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bilan/comportemental")
 */
class BilanComportementalController extends AbstractController
{
    /**
     * @Route("/", name="bilan_comportemental_index", methods={"GET"})
     */
    public function index(BilanComportementalRepository $bilanComportementalRepository): Response
    {
        return $this->render('EnSavoirPlus/bilan_comportemental/index.html.twig', [
            'bilan_comportementals' => $bilanComportementalRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bilan_comportemental_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bilanComportemental = new BilanComportemental();
        $form = $this->createForm(BilanComportementalType::class, $bilanComportemental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bilanComportemental);
            $entityManager->flush();

            return $this->redirectToRoute('bilan_comportemental_index');
        }

        return $this->render('bilan_comportemental/new.html.twig', [
            'bilan_comportemental' => $bilanComportemental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bilan_comportemental_show", methods={"GET"})
     */
    public function show(BilanComportemental $bilanComportemental): Response
    {
        return $this->render('bilan_comportemental/show.html.twig', [
            'bilan_comportemental' => $bilanComportemental,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bilan_comportemental_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BilanComportemental $bilanComportemental): Response
    {
        $form = $this->createForm(BilanComportementalType::class, $bilanComportemental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bilan_comportemental_index');
        }

        return $this->render('bilan_comportemental/edit.html.twig', [
            'bilan_comportemental' => $bilanComportemental,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bilan_comportemental_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BilanComportemental $bilanComportemental): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bilanComportemental->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bilanComportemental);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bilan_comportemental_index');
    }
}
