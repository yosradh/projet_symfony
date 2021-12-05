<?php

namespace App\Controller;

use App\Entity\Documents;
use App\Form\DocumentsType;
use App\Repository\DocumentsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/documents")
 */
class DocumentsController extends AbstractController
{
    /**
     * @Route("/", name="documents_index", methods={"GET"})
     */
    public function index(DocumentsRepository $documentsRepository): Response
    {
        return $this->render('documents/index.html.twig', [
            'documents' => $documentsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="documents_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $document = new Documents();
        $form = $this->createForm(DocumentsType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($document);
            $entityManager->flush();

            return $this->redirectToRoute('documents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('documents/new.html.twig', [
            'document' => $document,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="documents_show", methods={"GET"})
     */
    public function show(Documents $document): Response
    {
        return $this->render('documents/show.html.twig', [
            'document' => $document,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="documents_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Documents $document, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DocumentsType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('documents_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('documents/edit.html.twig', [
            'document' => $document,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="documents_delete", methods={"POST"})
     */
    public function delete(Request $request, Documents $document, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('documents_index', [], Response::HTTP_SEE_OTHER);
    }
}
