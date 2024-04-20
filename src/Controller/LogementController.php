<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;



class LogementController extends AbstractController
{
    #[Route('/logement', name: 'logement.index')]
    public function index(Request $request): Response
    {
        return $this->render('logement/index.html.twig');
    }
    #[Route('/logement/{slug}-{id}', name: 'logement.show')]
    public function show(Request $request, string $slug, int $id): Response
    {
       
       
        return $this->render('logement/show.html.twig', [
            'slug' => $slug,
            'id' => $id

        ]);
        
    }
}
