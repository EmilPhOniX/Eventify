<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Artist;
use App\Entity\Event;
use PHPUnit\Framework\TestCase;

class ArtistTest extends TestCase
{
    public function testArtistName(): void
    {
        $artist = new Artist();
        $name = 'The Beatles';
        
        $artist->setName($name);
        
        $this->assertSame($name, $artist->getName());
    }

    public function testArtistDescription(): void
    {
        $artist = new Artist();
        $description = 'A legendary rock band.';
        
        $artist->setDescription($description);
        
        $this->assertSame($description, $artist->getDescription());
    }

    public function testArtistImage(): void
    {
        $artist = new Artist();
        $image = 'beatles.jpg';
        
        $artist->setImage($image);
        
        $this->assertSame($image, $artist->getImage());
    }

    public function testAddAndRemoveEvent(): void
    {
        $artist = new Artist();
        $event = new Event();
        
        $artist->addEvent($event);
        
        $this->assertTrue($artist->getEvents()->contains($event));
        $this->assertSame($artist, $event->getArtist());
        
        $artist->removeEvent($event);
        
        $this->assertFalse($artist->getEvents()->contains($event));
        $this->assertNull($event->getArtist());
    }
}
