<?php

namespace App\Controller;

use App\Entity\TypeBouclerieLaisse;
use App\Form\TypeBouclerieLaisseType;
use App\Repository\TypeBouclerieLaisseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/bouclerie/laisse")
 */
class TypeBouclerieLaisseController extends AbstractController
{
    /**
     * @Route("/", name="type_bouclerie_laisse_index", methods={"GET"})
     */
    public function index(TypeBouclerieLaisseRepository $typeBouclerieLaisseRepository): Response
    {
        return $this->render('type_bouclerie_laisse/index.html.twig', [
            'type_bouclerie_laisses' => $typeBouclerieLaisseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="type_bouclerie_laisse_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typeBouclerieLaisse = new TypeBouclerieLaisse();
        $form = $this->createForm(TypeBouclerieLaisseType::class, $typeBouclerieLaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typeBouclerieLaisse);
            $entityManager->flush();

            return $this->redirectToRoute('type_bouclerie_laisse_index');
        }

        return $this->render('type_bouclerie_laisse/new.html.twig', [
            'type_bouclerie_laisse' => $typeBouclerieLaisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_bouclerie_laisse_show", methods={"GET"})
     */
    public function show(TypeBouclerieLaisse $typeBouclerieLaisse): Response
    {
        return $this->render('type_bouclerie_laisse/show.html.twig', [
            'type_bouclerie_laisse' => $typeBouclerieLaisse,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="type_bouclerie_laisse_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypeBouclerieLaisse $typeBouclerieLaisse): Response
    {
        $form = $this->createForm(TypeBouclerieLaisseType::class, $typeBouclerieLaisse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_bouclerie_laisse_index');
        }

        return $this->render('type_bouclerie_laisse/edit.html.twig', [
            'type_bouclerie_laisse' => $typeBouclerieLaisse,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_bouclerie_laisse_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypeBouclerieLaisse $typeBouclerieLaisse): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeBouclerieLaisse->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typeBouclerieLaisse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_bouclerie_laisse_index');
    }
}
