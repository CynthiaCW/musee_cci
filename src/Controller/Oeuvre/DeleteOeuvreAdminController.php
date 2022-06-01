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
class DeleteOeuvreAdminController extends AbstractController
{
    

    #[Route('/{id}/delete', name: 'app_oeuvre_admin_delete', methods: ['POST'])]
    public function delete(Request $request, Oeuvre $oeuvre, OeuvreRepository $oeuvreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $oeuvreRepository->remove($oeuvre, true);
        }

        return $this->redirectToRoute('app_oeuvre_admin_index', [], Response::HTTP_SEE_OTHER);
    }
}
