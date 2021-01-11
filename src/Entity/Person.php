<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Lastname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Firstname;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $StreetAddress;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $City;

    /**
     * @ORM\Column(type="integer")
     */
    private $Zipcode;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Country;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getStreetAddress(): ?string
    {
        return $this->StreetAddress;
    }

    public function setStreetAddress(string $StreetAddress): self
    {
        $this->StreetAddress = $StreetAddress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getZipcode(): ?int
    {
        return $this->Zipcode;
    }

    public function setZipcode(int $Zipcode): self
    {
        $this->Zipcode = $Zipcode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): self
    {
        $this->Country = $Country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
