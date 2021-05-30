<?php

namespace App\Controller;

use App\Entity\VisitePromenade;
use App\Form\VisitePromenadeType;
use App\Repository\VisitePromenadeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/visite/promenade")
 */
class VisitePromenadeController extends AbstractController
{
    /**
     * @Route("/", name="visite_promenade_index", methods={"GET"})
     */
    public function index(VisitePromenadeRepository $visitePromenadeRepository): Response
    {
        return $this->render('EnSavoirPlus/visite_promenade/index.html.twig', [
            'visite_promenades' => $visitePromenadeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="visite_promenade_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $visitePromenade = new VisitePromenade();
        $form = $this->createForm(VisitePromenadeType::class, $visitePromenade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($visitePromenade);
            $entityManager->flush();

            return $this->redirectToRoute('visite_promenade_index');
        }

        return $this->render('visite_promenade/new.html.twig', [
            'visite_promenade' => $visitePromenade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="visite_promenade_show", methods={"GET"})
     */
    public function show(VisitePromenade $visitePromenade): Response
    {
        return $this->render('visite_promenade/show.html.twig', [
            'visite_promenade' => $visitePromenade,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="visite_promenade_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, VisitePromenade $visitePromenade): Response
    {
        $form = $this->createForm(VisitePromenadeType::class, $visitePromenade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('visite_promenade_index');
        }

        return $this->render('visite_promenade/edit.html.twig', [
            'visite_promenade' => $visitePromenade,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="visite_promenade_delete", methods={"DELETE"})
     */
    public function delete(Request $request, VisitePromenade $visitePromenade): Response
    {
        if ($this->isCsrfTokenValid('delete'.$visitePromenade->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($visitePromenade);
            $entityManager->flush();
        }

        return $this->redirectToRoute('visite_promenade_index');
    }
}
