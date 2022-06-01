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
class IndexOeuvreAdminController extends AbstractController
{
    #[Route('/', name: 'app_oeuvre_admin_index', methods: ['GET'])]
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('admin/oeuvre_admin/index.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
        ]);
    }
}
