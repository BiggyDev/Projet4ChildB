<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
{
    /**
     * @var int The Id of the child.
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The Name of the child.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string The Lastname of the child.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @var int The Age of the child.
     *
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @var string The Gender of the child.
     *
     * @ORM\Column(type="string", length=20)
     */
    private $gender;

    /**
     * @var string The Info of the child.
     *
     * @ORM\Column(type="text")
     */
    private $info;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Contact", mappedBy="child")
     */
    private $contacts;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="children")
     */
    private $client;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Provider", mappedBy="child")
     */
    private $providers;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
        $this->providers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): self
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @return Collection|Contact[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(Contact $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->addChild($this);
        }

        return $this;
    }

    public function removeContact(Contact $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            $contact->removeChild($this);
        }

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection|Provider[]
     */
    public function getProviders(): Collection
    {
        return $this->providers;
    }

    public function addProvider(Provider $provider): self
    {
        if (!$this->providers->contains($provider)) {
            $this->providers[] = $provider;
            $provider->addChild($this);
        }

        return $this;
    }

    public function removeProvider(Provider $provider): self
    {
        if ($this->providers->contains($provider)) {
            $this->providers->removeElement($provider);
            $provider->removeChild($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name;
    }
}
