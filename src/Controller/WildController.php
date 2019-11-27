<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wild", name="wild_")
 */
class WildController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig');
    }

    /**
     * @Route("/show/{slug}", requirements={"slug"="^[a-z0-9-]*$"}, name="show")
     */
    public function show($slug): Response
    {
        $titre = empty($slug)
            ? "Aucune série sélectionnée, veuillez choisir une série"
            : ucwords(str_replace("-", " ", $slug));

        return $this->render(
            'wild/show.html.twig',
            array(
                'titre' => $titre
            )
        );
    }
}
