<?php

namespace App\Controller;

use App\Entity\LogementD;
use App\Form\LogementDType;
use App\Repository\LogementDRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/logement/d')]
class LogementDController extends AbstractController
{
    #[Route('/', name: 'app_logement_d_index', methods: ['GET'])]
    public function index(LogementDRepository $logementDRepository): Response
    {
        return $this->render('logement_d/index.html.twig', [
            'logement_ds' => $logementDRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_logement_d_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $logementD = new LogementD();
        $form = $this->createForm(LogementDType::class, $logementD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($logementD);
            $entityManager->flush();

            return $this->redirectToRoute('app_logement_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('logement_d/new.html.twig', [
            'logement_d' => $logementD,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_logement_d_show', methods: ['GET'])]
    public function show(LogementD $logementD): Response
    {
        return $this->render('logement_d/show.html.twig', [
            'logement_d' => $logementD,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_logement_d_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LogementD $logementD, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LogementDType::class, $logementD);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_logement_d_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('logement_d/edit.html.twig', [
            'logement_d' => $logementD,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_logement_d_delete', methods: ['POST'])]
    public function delete(Request $request, LogementD $logementD, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$logementD->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($logementD);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_logement_d_index', [], Response::HTTP_SEE_OTHER);
    }
}
