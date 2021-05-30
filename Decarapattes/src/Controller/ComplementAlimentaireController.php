<?php

namespace App\Controller;

use App\Entity\ComplementAlimentaire;
use App\Form\ComplementAlimentaireType;
use App\Repository\ComplementAlimentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/complement/alimentaire")
 */
class ComplementAlimentaireController extends AbstractController
{
    /**
     * @Route("/", name="complement_alimentaire_index", methods={"GET"})
     */
    public function index(ComplementAlimentaireRepository $complementAlimentaireRepository): Response
    {
        return $this->render('complement_alimentaire/index.html.twig', [
            'complement_alimentaires' => $complementAlimentaireRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="complement_alimentaire_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $complementAlimentaire = new ComplementAlimentaire();
        $form = $this->createForm(ComplementAlimentaireType::class, $complementAlimentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($complementAlimentaire);
            $entityManager->flush();

            return $this->redirectToRoute('complement_alimentaire_index');
        }

        return $this->render('complement_alimentaire/new.html.twig', [
            'complement_alimentaire' => $complementAlimentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complement_alimentaire_show", methods={"GET"})
     */
    public function show(ComplementAlimentaire $complementAlimentaire): Response
    {
        return $this->render('complement_alimentaire/show.html.twig', [
            'complement_alimentaire' => $complementAlimentaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="complement_alimentaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ComplementAlimentaire $complementAlimentaire): Response
    {
        $form = $this->createForm(ComplementAlimentaireType::class, $complementAlimentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('complement_alimentaire_index');
        }

        return $this->render('complement_alimentaire/edit.html.twig', [
            'complement_alimentaire' => $complementAlimentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="complement_alimentaire_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ComplementAlimentaire $complementAlimentaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$complementAlimentaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($complementAlimentaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('complement_alimentaire_index');
    }
}
