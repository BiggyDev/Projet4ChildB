<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ProviderRepository")
 */
class Provider
{
    /**
     * @var int The id of the provider.
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of the provider.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string The last name of the provider.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @var string The email address of the provider.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @var string The password of the provider.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @var string The token of the provider.
     *
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @var \DateTimeInterface The date of registration of the provider.
     *
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @var \DateTimeInterface Date of update of provider's data.
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updated_at;

    /**
     * @var array Qualifications of the provider.
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $qualification = [];

    /**
     * @var int Phone number of the provider.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;

    /**
     * @
     *
     * @ORM\Column(type="string", length=20)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $gender;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $localisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $available;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $schedule;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $siret;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Comment", mappedBy="provider")
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Child", inversedBy="providers")
     */
    private $child;

    public function __construct()
    {
        $this->comment = new ArrayCollection();
        $this->child = new ArrayCollection();
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getQualification(): ?array
    {
        return $this->qualification;
    }

    public function setQualification(?array $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(?string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getAvailable(): ?string
    {
        return $this->available;
    }

    public function setAvailable(string $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(string $schedule): self
    {
        $this->schedule = $schedule;

        return $this;
    }

    public function getSiret(): ?int
    {
        return $this->siret;
    }

    public function setSiret(?int $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setProvider($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->contains($comment)) {
            $this->comment->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getProvider() === $this) {
                $comment->setProvider(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Child[]
     */
    public function getChild(): Collection
    {
        return $this->child;
    }

    public function addChild(Child $child): self
    {
        if (!$this->child->contains($child)) {
            $this->child[] = $child;
        }

        return $this;
    }

    public function removeChild(Child $child): self
    {
        if ($this->child->contains($child)) {
            $this->child->removeElement($child);
        }

        return $this;
    }
}
