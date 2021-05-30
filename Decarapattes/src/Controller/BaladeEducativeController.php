<?php

namespace App\Controller;

use App\Entity\BaladeEducative;
use App\Form\BaladeEducativeType;
use App\Repository\BaladeEducativeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/balade/educative")
 */
class BaladeEducativeController extends AbstractController
{
    /**
     * @Route("/", name="balade_educative_index", methods={"GET"})
     */
    public function index(BaladeEducativeRepository $baladeEducativeRepository): Response
    {
        return $this->render('EnSavoirPlus/balade_educative/index.html.twig', [
            'balade_educatives' => $baladeEducativeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="balade_educative_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $baladeEducative = new BaladeEducative();
        $form = $this->createForm(BaladeEducativeType::class, $baladeEducative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($baladeEducative);
            $entityManager->flush();

            return $this->redirectToRoute('balade_educative_index');
        }

        return $this->render('balade_educative/new.html.twig', [
            'balade_educative' => $baladeEducative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="balade_educative_show", methods={"GET"})
     */
    public function show(BaladeEducative $baladeEducative): Response
    {
        return $this->render('balade_educative/show.html.twig', [
            'balade_educative' => $baladeEducative,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="balade_educative_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BaladeEducative $baladeEducative): Response
    {
        $form = $this->createForm(BaladeEducativeType::class, $baladeEducative);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('balade_educative_index');
        }

        return $this->render('balade_educative/edit.html.twig', [
            'balade_educative' => $baladeEducative,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="balade_educative_delete", methods={"DELETE"})
     */
    public function delete(Request $request, BaladeEducative $baladeEducative): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baladeEducative->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($baladeEducative);
            $entityManager->flush();
        }

        return $this->redirectToRoute('balade_educative_index');
    }
}
