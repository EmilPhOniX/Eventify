<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/artist')]
final class ApiArtistController extends AbstractController
{
    #[Route('', name: 'api_artist_index', methods: ['GET'])]
    public function index(ArtistRepository $artistRepository): JsonResponse
    {
        $artists = $artistRepository->findAll();
        $data = array_map(fn($artist) => [
            'id' => $artist->getId(),
            'name' => $artist->getName(),
            'description' => $artist->getDescription(),
            'image' => $artist->getImage(),
            'events' => array_map(fn($event) => [
                'id' => $event->getId(),
                'name' => $event->getName(),
                'date' => $event->getDate()->format('Y-m-d H:i:s'),
            ], $artist->getEvents()->toArray()),
        ], $artists);

        return $this->json($data);
    }

    #[Route('/{id}', name: 'api_artist_show', methods: ['GET'])]
    public function show(Artist $artist): JsonResponse
    {
        return $this->json([
            'id' => $artist->getId(),
            'name' => $artist->getName(),
            'description' => $artist->getDescription(),
            'image' => $artist->getImage(),
            'events' => array_map(fn($event) => [
                'id' => $event->getId(),
                'name' => $event->getName(),
                'date' => $event->getDate()->format('Y-m-d H:i:s'),
            ], $artist->getEvents()->toArray()),
        ]);
    }
}
