<?php

namespace App\Controller\Theme;

use App\Entity\Theme;
use App\Repository\ThemeRepository;
use App\Form\ThemeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//accede au theme de l'admin
#[Route('/admin/theme')]
class ThemeCreateController extends AbstractController
{
    #[Route('/new', name: 'app_theme_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ThemeRepository $themeRepository): Response
    {
        $theme = new Theme();
        $form = $this->createForm(ThemeType::class, $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $themeRepository->add($theme, true);

            return $this->redirectToRoute('app_theme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/theme/new.html.twig', [
            'theme' => $theme,
            'form' => $form,
        ]);
    }
}