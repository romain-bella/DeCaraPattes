<?php

namespace App\Controller;

use App\Entity\CoursCollectifs;
use App\Form\CoursCollectifsType;
use App\Repository\CoursCollectifsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/cours/collectifs")
 */
class CoursCollectifsController extends AbstractController
{
    /**
     * @Route("/", name="cours_collectifs_index", methods={"GET"})
     */
    public function index(CoursCollectifsRepository $coursCollectifsRepository): Response
    {
        return $this->render('EnSavoirPlus/cours_collectifs/index.html.twig', [
            'cours_collectifs' => $coursCollectifsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cours_collectifs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $coursCollectif = new CoursCollectifs();
        $form = $this->createForm(CoursCollectifsType::class, $coursCollectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coursCollectif);
            $entityManager->flush();

            return $this->redirectToRoute('cours_collectifs_index');
        }

        return $this->render('cours_collectifs/new.html.twig', [
            'cours_collectif' => $coursCollectif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cours_collectifs_show", methods={"GET"})
     */
    public function show(CoursCollectifs $coursCollectif): Response
    {
        return $this->render('cours_collectifs/show.html.twig', [
            'cours_collectif' => $coursCollectif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cours_collectifs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CoursCollectifs $coursCollectif): Response
    {
        $form = $this->createForm(CoursCollectifsType::class, $coursCollectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cours_collectifs_index');
        }

        return $this->render('cours_collectifs/edit.html.twig', [
            'cours_collectif' => $coursCollectif,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cours_collectifs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CoursCollectifs $coursCollectif): Response
    {
        if ($this->isCsrfTokenValid('delete'.$coursCollectif->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coursCollectif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cours_collectifs_index');
    }
}
