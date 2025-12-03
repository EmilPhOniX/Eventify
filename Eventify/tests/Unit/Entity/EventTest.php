<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Event;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class EventTest extends TestCase
{
    public function testEventName(): void
    {
        $event = new Event();
        $name = 'Concert';
        
        $event->setName($name);
        
        $this->assertSame($name, $event->getName());
    }

    public function testEventDate(): void
    {
        $event = new Event();
        $date = new \DateTime('2023-01-01');
        
        $event->setDate($date);
        
        $this->assertSame($date, $event->getDate());
    }

    public function testAddAndRemoveParticipant(): void
    {
        $event = new Event();
        $user = new User();
        
        $event->addParticipant($user);
        
        $this->assertTrue($event->getParticipants()->contains($user));
        $this->assertTrue($user->getEventsParticipated()->contains($event));
        
        $event->removeParticipant($user);
        
        $this->assertFalse($event->getParticipants()->contains($user));
        $this->assertFalse($user->getEventsParticipated()->contains($event));
    }
}
