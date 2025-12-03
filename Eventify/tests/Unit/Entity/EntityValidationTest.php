<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EntityValidationTest extends TestCase
{
    private ValidatorInterface $validator;

    protected function setUp(): void
    {
        $this->validator = Validation::createValidatorBuilder()
            ->enableAttributeMapping()
            ->getValidator();
    }

    public function testInvalidEvent(): void
    {
        $event = new Event();
        // Name is null/empty, Date is null
        
        $violations = $this->validator->validate($event);
        
        // Expecting violations for name (NotBlank) and date (NotNull)
        $this->assertGreaterThan(0, count($violations));
    }

    public function testEventNameTooShort(): void
    {
        $event = new Event();
        $event->setName('Ab'); // Too short (min 3)
        $event->setDate(new \DateTime());
        
        $violations = $this->validator->validate($event);
        
        $this->assertGreaterThan(0, count($violations));
        $this->assertSame('This value is too short. It should have 3 characters or more.', $violations[0]->getMessage());
    }

    public function testInvalidUserEmail(): void
    {
        $user = new User();
        $user->setEmail('invalid-email'); // Invalid email format
        $user->setPassword('password123');
        
        // Validate only the email property to avoid UniqueEntity constraint which requires DB
        $violations = $this->validator->validateProperty($user, 'email');
        
        $this->assertGreaterThan(0, count($violations));
        $this->assertSame('This value is not a valid email address.', $violations[0]->getMessage());
    }

    public function testInvalidUserPassword(): void
    {
        $user = new User();
        $user->setEmail('test@example.com');
        // Password is null
        
        // Validate only the password property
        $violations = $this->validator->validateProperty($user, 'password');
        
        $this->assertGreaterThan(0, count($violations));
    }

    public function testInvalidArtistName(): void
    {
        $artist = new Artist();
        // Name is null
        
        $violations = $this->validator->validate($artist);
        
        $this->assertGreaterThan(0, count($violations));
    }

    public function testValidArtist(): void
    {
        $artist = new Artist();
        $artist->setName('Valid Artist');
        
        $violations = $this->validator->validate($artist);
        
        $this->assertCount(0, $violations);
    }
}
