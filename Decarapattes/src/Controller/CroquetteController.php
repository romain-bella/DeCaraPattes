<?php

namespace App\Controller;

use App\Entity\Croquette;
use App\Form\CroquetteType;
use App\Repository\CroquetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/croquette")
 */
class CroquetteController extends AbstractController
{
    /**
     * @Route("/", name="croquette_index", methods={"GET"})
     */
    public function index(CroquetteRepository $croquetteRepository): Response
    {
        return $this->render('croquette/index.html.twig', [
            'croquettes' => $croquetteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="croquette_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $croquette = new Croquette();
        $form = $this->createForm(CroquetteType::class, $croquette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($croquette);
            $entityManager->flush();

            return $this->redirectToRoute('croquette_index');
        }

        return $this->render('croquette/new.html.twig', [
            'croquette' => $croquette,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="croquette_show", methods={"GET"})
     */
    public function show(Croquette $croquette): Response
    {
        return $this->render('croquette/show.html.twig', [
            'croquette' => $croquette,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="croquette_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Croquette $croquette): Response
    {
        $form = $this->createForm(CroquetteType::class, $croquette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('croquette_index');
        }

        return $this->render('croquette/edit.html.twig', [
            'croquette' => $croquette,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="croquette_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Croquette $croquette): Response
    {
        if ($this->isCsrfTokenValid('delete'.$croquette->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($croquette);
            $entityManager->flush();
        }

        return $this->redirectToRoute('croquette_index');
    }
}
