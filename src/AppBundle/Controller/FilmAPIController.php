<?php

namespace AppBundle\Controller;

use AppBundle\Manager\FilmManager;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

use JMS\Serializer\SerializerBuilder;

class FilmAPIController extends Controller
{


    private function getManager()
    {
        return new FilmManager($this->getDoctrine()->getManager());
    }

    /**
     * @Route("/api/films", methods={"GET"})
     */
    public function getFilms() {
        // Obtention du manager
        $manager = $this->getManager();
        // Recherche du film
        $films = $manager->loadFilms();

        $serializer = SerializerBuilder::create()->build();
        $data = $serializer->serialize($films, 'json');
            //, SerializationContext::create()->setGroups(array('list')));
        //$data =  $this->get('serializer')->serialize($films, 'json');
        // Retour du résultat en Json
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }

    /**
     * @Route("/api/films/{id}", methods={"GET"})
     * @param $id
     * @return Response
     */
    public function getFilm($id) {
        // Obtention du manager
        $manager = $this->getManager();
        // Recherche du film
        if (!$film = $manager->loadFilm($id))
        {
            throw new NotFoundHttpException("Le film n'existe pas");
        }

        $serializer = SerializerBuilder::create()->build();
        $data = $serializer->serialize($film, 'json');

        //$data =  $this->get('serializer')->serialize($film, 'json');
        // Retour du résultat en Json
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
}
