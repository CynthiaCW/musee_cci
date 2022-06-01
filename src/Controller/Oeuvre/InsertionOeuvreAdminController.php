<?php

namespace App\Controller\Oeuvre;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/oeuvre')]
class InsertionOeuvreAdminController extends AbstractController
{

    #[Route('/new', name: 'app_oeuvre_admin_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OeuvreRepository $oeuvreRepository): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvreRepository->add($oeuvre, true);

            return $this->redirectToRoute('app_oeuvre_admin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/oeuvre_admin/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form,
        ]);
    }

}
