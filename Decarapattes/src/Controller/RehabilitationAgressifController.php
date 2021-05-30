<?php

namespace App\Controller;

use App\Entity\RehabilitationAgressif;
use App\Form\RehabilitationAgressifType;
use App\Repository\RehabilitationAgressifRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rehabilitation/agressif")
 */
class RehabilitationAgressifController extends AbstractController
{
    /**
     * @Route("/", name="rehabilitation_agressif_index", methods={"GET"})
     */
    public function index(RehabilitationAgressifRepository $rehabilitationAgressifRepository): Response
    {
        return $this->render('EnSavoirPlus/rehabilitation_agressif/index.html.twig', [
            'rehabilitation_agressifs' => $rehabilitationAgressifRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rehabilitation_agressif_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rehabilitationAgressif = new RehabilitationAgressif();
        $form = $this->createForm(RehabilitationAgressifType::class, $rehabilitationAgressif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rehabilitationAgressif);
            $entityManager->flush();

            return $this->redirectToRoute('rehabilitation_agressif_index');
        }

        return $this->render('rehabilitation_agressif/new.html.twig', [
            'rehabilitation_agressif' => $rehabilitationAgressif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rehabilitation_agressif_show", methods={"GET"})
     */
    public function show(RehabilitationAgressif $rehabilitationAgressif): Response
    {
        return $this->render('rehabilitation_agressif/show.html.twig', [
            'rehabilitation_agressif' => $rehabilitationAgressif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rehabilitation_agressif_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RehabilitationAgressif $rehabilitationAgressif): Response
    {
        $form = $this->createForm(RehabilitationAgressifType::class, $rehabilitationAgressif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rehabilitation_agressif_index');
        }

        return $this->render('rehabilitation_agressif/edit.html.twig', [
            'rehabilitation_agressif' => $rehabilitationAgressif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="rehabilitation_agressif_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RehabilitationAgressif $rehabilitationAgressif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rehabilitationAgressif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rehabilitationAgressif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rehabilitation_agressif_index');
    }
}
