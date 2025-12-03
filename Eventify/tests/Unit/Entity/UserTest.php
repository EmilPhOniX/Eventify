<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Event;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserEmail(): void
    {
        $user = new User();
        $email = 'test@example.com';
        
        $user->setEmail($email);
        
        $this->assertSame($email, $user->getEmail());
        $this->assertSame($email, $user->getUserIdentifier());
    }

    public function testUserRoles(): void
    {
        $user = new User();
        $roles = ['ROLE_ADMIN'];
        
        $user->setRoles($roles);
        
        $this->assertContains('ROLE_USER', $user->getRoles());
        $this->assertContains('ROLE_ADMIN', $user->getRoles());
    }

    public function testUserPassword(): void
    {
        $user = new User();
        $password = 'hashed_password';
        
        $user->setPassword($password);
        
        $this->assertSame($password, $user->getPassword());
    }

    public function testAddAndRemoveEvent(): void
    {
        $user = new User();
        $event = new Event();
        
        $user->addEvent($event);
        
        $this->assertTrue($user->getEvents()->contains($event));
        $this->assertSame($user, $event->getCreatorID());
        
        $user->removeEvent($event);
        
        $this->assertFalse($user->getEvents()->contains($event));
        $this->assertNull($event->getCreatorID());
    }

    public function testAddAndRemoveEventsParticipated(): void
    {
        $user = new User();
        $event = new Event();
        
        $user->addEventsParticipated($event);
        
        $this->assertTrue($user->getEventsParticipated()->contains($event));
        
        $user->removeEventsParticipated($event);
        
        $this->assertFalse($user->getEventsParticipated()->contains($event));
    }
}
