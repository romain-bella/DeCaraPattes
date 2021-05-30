<?php

namespace App\Controller;

use App\Entity\TypeBouclerieCollier;
use App\Form\TypeBouclerieCollierType;
use App\Repository\TypeBouclerieCollierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/bouclerie/collier")
 */
class TypeBouclerieCollierController extends AbstractController
{
    /**
     * @Route("/", name="type_bouclerie_collier_index", methods={"GET"})
     */
    public function index(TypeBouclerieCollierRepository $typeBouclerieCollierRepository): Response
    {
        return $this->render('type_bouclerie_collier/index.html.twig', [
            'type_bouclerie_colliers' => $typeBouclerieCollierRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_bouclerie_collier_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeBouclerieCollier = new TypeBouclerieCollier();
        $form = $this->createForm(TypeBouclerieCollierType::class, $typeBouclerieCollier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeBouclerieCollier);
            $entityManager->flush();

            return $this->redirectToRoute('type_bouclerie_collier_index');
        }

        return $this->render('type_bouclerie_collier/new.html.twig', [
            'type_bouclerie_collier' => $typeBouclerieCollier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_bouclerie_collier_show", methods={"GET"})
     */
    public function show(TypeBouclerieCollier $typeBouclerieCollier): Response
    {
        return $this->render('type_bouclerie_collier/show.html.twig', [
            'type_bouclerie_collier' => $typeBouclerieCollier,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_bouclerie_collier_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeBouclerieCollier $typeBouclerieCollier): Response
    {
        $form = $this->createForm(TypeBouclerieCollierType::class, $typeBouclerieCollier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_bouclerie_collier_index');
        }

        return $this->render('type_bouclerie_collier/edit.html.twig', [
            'type_bouclerie_collier' => $typeBouclerieCollier,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_bouclerie_collier_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeBouclerieCollier $typeBouclerieCollier): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeBouclerieCollier->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeBouclerieCollier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_bouclerie_collier_index');
    }
}
