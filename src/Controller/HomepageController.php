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
        $upcomingEvents = $eventRepository->findUpcomingEvents();

        $user = $this->getUser();

        if ($user) {
            foreach ($upcomingEvents as $event) {
                $event->isUserRegistered = $event->getParticipants()->contains($user);
            }
        }

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'upcoming_events' => $upcomingEvents,
        ]);
    }
}
