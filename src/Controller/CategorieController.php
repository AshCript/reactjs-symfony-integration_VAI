<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\ProduitRepository;
use App\Repository\CategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/prod", name="categorie")
     */
    public function index(CategorieRepository $repCategorie, ProduitRepository $repProduit, EntityManagerInterface $manager): Response
    {
        // if($repCategorie->count([]) == 0){
        //     $smartphone = new Categorie();
        //     $laptop = new Categorie();
        //     $desktop = new Categorie();

        //     $smartphone->setNom('Smartphone')
        //                ->setCreatedAt(new \DateTime());
        //     $laptop->setNom('Laptop')
        //            ->setCreatedAt(new \DateTime());
        //     $desktop->setNom('Desktop')
        //             ->setCreatedAt(new \DateTime());
        //     $manager->persist($smartphone);
        //     $manager->persist($laptop);
        //     $manager->persist($desktop);
        //     $manager->flush;

        //     // dd($smartphone, $laptop, $desktop);
        // }
        if($this->getUser()->getRoles() == ['ROLE_ADMIN']){
            return $this->redirectToRoute('admin_home');
        }
        return $this->render('categorie/index.html.twig', [
            'categories' => $repCategorie->findAll()
        ]);
    }

}
