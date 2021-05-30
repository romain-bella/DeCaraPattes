<?php

namespace App\Controller;

use App\Entity\HygieneEtSoin;
use App\Form\HygieneEtSoinType;
use App\Repository\HygieneEtSoinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/hygiene/et/soin")
 */
class HygieneEtSoinController extends AbstractController
{
    /**
     * @Route("/", name="hygiene_et_soin_index", methods={"GET"})
     */
    public function index(HygieneEtSoinRepository $hygieneEtSoinRepository): Response
    {
        return $this->render('hygiene_et_soin/index.html.twig', [
            'hygiene_et_soins' => $hygieneEtSoinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="hygiene_et_soin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hygieneEtSoin = new HygieneEtSoin();
        $form = $this->createForm(HygieneEtSoinType::class, $hygieneEtSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hygieneEtSoin);
            $entityManager->flush();

            return $this->redirectToRoute('hygiene_et_soin_index');
        }

        return $this->render('hygiene_et_soin/new.html.twig', [
            'hygiene_et_soin' => $hygieneEtSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hygiene_et_soin_show", methods={"GET"})
     */
    public function show(HygieneEtSoin $hygieneEtSoin): Response
    {
        return $this->render('hygiene_et_soin/show.html.twig', [
            'hygiene_et_soin' => $hygieneEtSoin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="hygiene_et_soin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HygieneEtSoin $hygieneEtSoin): Response
    {
        $form = $this->createForm(HygieneEtSoinType::class, $hygieneEtSoin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hygiene_et_soin_index');
        }

        return $this->render('hygiene_et_soin/edit.html.twig', [
            'hygiene_et_soin' => $hygieneEtSoin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="hygiene_et_soin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HygieneEtSoin $hygieneEtSoin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hygieneEtSoin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hygieneEtSoin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('hygiene_et_soin_index');
    }
}
