<?php

namespace App\Controller;

use App\Entity\ConseilAdoption;
use App\Form\ConseilAdoptionType;
use App\Repository\ConseilAdoptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/conseil/adoption")
 */
class ConseilAdoptionController extends AbstractController
{
    /**
     * @Route("/", name="conseil_adoption_index", methods={"GET"})
     */
    public function index(ConseilAdoptionRepository $conseilAdoptionRepository): Response
    {
        return $this->render('EnSavoirPlus/conseil_adoption/index.html.twig', [
            'conseil_adoptions' => $conseilAdoptionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="conseil_adoption_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $conseilAdoption = new ConseilAdoption();
        $form = $this->createForm(ConseilAdoptionType::class, $conseilAdoption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($conseilAdoption);
            $entityManager->flush();

            return $this->redirectToRoute('conseil_adoption_index');
        }

        return $this->render('conseil_adoption/new.html.twig', [
            'conseil_adoption' => $conseilAdoption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conseil_adoption_show", methods={"GET"})
     */
    public function show(ConseilAdoption $conseilAdoption): Response
    {
        return $this->render('conseil_adoption/show.html.twig', [
            'conseil_adoption' => $conseilAdoption,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="conseil_adoption_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ConseilAdoption $conseilAdoption): Response
    {
        $form = $this->createForm(ConseilAdoptionType::class, $conseilAdoption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('conseil_adoption_index');
        }

        return $this->render('conseil_adoption/edit.html.twig', [
            'conseil_adoption' => $conseilAdoption,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="conseil_adoption_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ConseilAdoption $conseilAdoption): Response
    {
        if ($this->isCsrfTokenValid('delete'.$conseilAdoption->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($conseilAdoption);
            $entityManager->flush();
        }

        return $this->redirectToRoute('conseil_adoption_index');
    }
}
