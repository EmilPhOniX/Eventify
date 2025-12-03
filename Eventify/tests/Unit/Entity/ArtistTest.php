<?php

namespace App\Tests\Unit\Entity;

// Importation de classes nécessaires pour les tests
use App\Entity\Artist;
use App\Entity\Event;
// Importation de la classe de test PHPUnit
use PHPUnit\Framework\TestCase;

/**
 * Classe de test pour l'entité Artist
 */
class ArtistTest extends TestCase
{
    /**
     * Teste la définition et la récupération du nom de l'artiste
     */
    public function testArtistName(): void
    {
        $artist = new Artist();
        $name = 'The Beatles';
        
        $artist->setName($name);
        
        // Vérifie que le nom a été correctement défini
        $this->assertSame($name, $artist->getName());
    }

    /**
     * Teste la définition et la récupération de la description de l'artiste
     */
    public function testArtistDescription(): void
    {
        $artist = new Artist();
        $description = 'A legendary rock band.';
        
        $artist->setDescription($description);
        
        // Vérifie que la description a été correctement définie
        $this->assertSame($description, $artist->getDescription());
    }

    /**
     * Teste la définition et la récupération de l'image de l'artiste
     */
    public function testArtistImage(): void
    {
        $artist = new Artist();
        $image = 'beatles.jpg';
        
        $artist->setImage($image);
        
        // Vérifie que l'image a été correctement définie
        $this->assertSame($image, $artist->getImage());
    }

    /**
     * Teste l'ajout et la suppression d'un événement associé à l'artiste
     */
    public function testAddAndRemoveEvent(): void
    {
        $artist = new Artist();
        $event = new Event();
        
        $artist->addEvent($event);
        
        $this->assertTrue($artist->getEvents()->contains($event));
        $this->assertSame($artist, $event->getArtist());
        
        $artist->removeEvent($event);
        
        // Vérifie que l'événement a été supprimé de l'artiste
        $this->assertFalse($artist->getEvents()->contains($event));
        // Vérifie que l'artiste de l'événement est nul après la suppression
        $this->assertNull($event->getArtist());
    }
}
