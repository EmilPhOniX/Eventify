<?php

namespace App\Controller;

use App\Entity\Event;
use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/event')]
final class ApiEventController extends AbstractController
{
    #[Route('', name: 'api_event_index', methods: ['GET'])]
    public function index(EventRepository $eventRepository): JsonResponse
    {
        $events = $eventRepository->findAll();
        $data = array_map(fn($event) => [
            'id' => $event->getId(),
            'name' => $event->getName(),
            'date' => $event->getDate()?->format('Y-m-d H:i:s'),
            'creator' => $event->getCreatorID()?->getId(),
        ], $events);

        return $this->json($data);
    }

    #[Route('/{id}', name: 'api_event_show', methods: ['GET'])]
    public function show(Event $event): JsonResponse
    {
        return $this->json([
            'id' => $event->getId(),
            'name' => $event->getName(),
            'date' => $event->getDate()?->format('Y-m-d H:i:s'),
            'location' => $event->getLocation(),
            'creator' => $event->getCreatorID()?->getId(),
        ]);
    }
}
