<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomepageController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function index(EventRepository $eventRepository): Response
    {
        // Récupérer les événements à venir en appelant la méthode findUpcomingEvents
        $upcomingEvents = $eventRepository->findUpcomingEvents();

        // Passer les événements à la vue
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'upcoming_events' => $upcomingEvents,  // Passer les événements à la vue
        ]);
    }
}
