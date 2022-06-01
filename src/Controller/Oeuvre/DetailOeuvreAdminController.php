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
class DetailOeuvreAdminController extends AbstractController
{
    

    #[Route('/{id}/show', name: 'app_oeuvre_admin_show', methods: ['GET'])]
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('admin/oeuvre_admin/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }

    
}
