<?php

namespace App\Controller;

use App\Entity\CoursIndividuelle;
use App\Form\CoursIndividuelleType;
use App\Repository\CoursIndividuelleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cours/individuelle")
 */
class CoursIndividuelleController extends AbstractController
{
    /**
     * @Route("/", name="cours_individuelle_index", methods={"GET"})
     */
    public function index(CoursIndividuelleRepository $coursIndividuelleRepository): Response
    {
        return $this->render('EnSavoirPlus/cours_individuelle/index.html.twig', [
            'cours_individuelles' => $coursIndividuelleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cours_individuelle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coursIndividuelle = new CoursIndividuelle();
        $form = $this->createForm(CoursIndividuelleType::class, $coursIndividuelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coursIndividuelle);
            $entityManager->flush();

            return $this->redirectToRoute('cours_individuelle_index');
        }

        return $this->render('cours_individuelle/new.html.twig', [
            'cours_individuelle' => $coursIndividuelle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cours_individuelle_show", methods={"GET"})
     */
    public function show(CoursIndividuelle $coursIndividuelle): Response
    {
        return $this->render('cours_individuelle/show.html.twig', [
            'cours_individuelle' => $coursIndividuelle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cours_individuelle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CoursIndividuelle $coursIndividuelle): Response
    {
        $form = $this->createForm(CoursIndividuelleType::class, $coursIndividuelle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_individuelle_index');
        }

        return $this->render('cours_individuelle/edit.html.twig', [
            'cours_individuelle' => $coursIndividuelle,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cours_individuelle_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CoursIndividuelle $coursIndividuelle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coursIndividuelle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coursIndividuelle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cours_individuelle_index');
    }
}
