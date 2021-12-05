<?php

namespace App\Controller;

use App\Entity\Avertissemets;
use App\Form\AvertissemetsType;
use App\Repository\AvertissemetsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/avertissemets")
 */
class AvertissemetsController extends AbstractController
{
    /**
     * @Route("/", name="avertissemets_index", methods={"GET"})
     */
    public function index(AvertissemetsRepository $avertissemetsRepository): Response
    {
        return $this->render('avertissemets/index.html.twig', [
            'avertissemets' => $avertissemetsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="avertissemets_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avertissemet = new Avertissemets();
        $form = $this->createForm(AvertissemetsType::class, $avertissemet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avertissemet);
            $entityManager->flush();

            return $this->redirectToRoute('avertissemets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avertissemets/new.html.twig', [
            'avertissemet' => $avertissemet,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="avertissemets_show", methods={"GET"})
     */
    public function show(Avertissemets $avertissemet): Response
    {
        return $this->render('avertissemets/show.html.twig', [
            'avertissemet' => $avertissemet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="avertissemets_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Avertissemets $avertissemet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvertissemetsType::class, $avertissemet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('avertissemets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('avertissemets/edit.html.twig', [
            'avertissemet' => $avertissemet,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="avertissemets_delete", methods={"POST"})
     */
    public function delete(Request $request, Avertissemets $avertissemet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avertissemet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($avertissemet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('avertissemets_index', [], Response::HTTP_SEE_OTHER);
    }
}
