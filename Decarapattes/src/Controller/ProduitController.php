<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\AccessoireRepository;
use App\Repository\JouetRepository;
use App\Repository\HygieneEtSoinRepository;
use App\Repository\ComplementAlimentaireRepository;
use App\Repository\CollierRepository;
use App\Repository\LaisseRepository;
use App\Repository\CroquetteRepository;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 * @Route("/produit")
 */
class ProduitController extends AbstractController
{
    /**
     * @Route("/", name="produit_index", methods={"GET"})
     */
    public function index(AccessoireRepository $AccessoireRepository, JouetRepository $JouetRepository, HygieneEtSoinRepository $HygieneEtSoinRepository, 
	ComplementAlimentaireRepository $ComplementAlimentaireRepository, CollierRepository $CollierRepository, LaisseRepository $LaisseRepository, 
	CroquetteRepository $CroquetteRepository): Response
    {
        return $this->render('produit/index.html.twig', [
			'accessoires' => $AccessoireRepository->findAll(), 
			'jouets' => $JouetRepository->findAll(),
			'soins' => $HygieneEtSoinRepository->findAll(), 
			'comps' => $ComplementAlimentaireRepository->findAll(),
			'colliers' => $CollierRepository->findAll(),
			'laisses' => $LaisseRepository->findAll(),
			'croquettes'=>$CroquetteRepository->findAll(),
        ]);
    }
	


}
