<?php

namespace App\Entity;

use App\Entity\Field\UuidTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Trip
{
    use UuidTrait;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $pinnedLatitude;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $pinnedLongitude;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=100)
     */
    private $pinnedName;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getPinnedLatitude(): float
    {
        return $this->pinnedLatitude;
    }

    public function setPinnedLatitude(float $pinnedLatitude): void
    {
        $this->pinnedLatitude = $pinnedLatitude;
    }

    public function getPinnedLongitude(): float
    {
        return $this->pinnedLongitude;
    }

    public function setPinnedLongitude(float $pinnedLongitude): void
    {
        $this->pinnedLongitude = $pinnedLongitude;
    }

    public function getPinnedName(): string
    {
        return $this->pinnedName;
    }

    public function setPinnedName(string $pinnedName): void
    {
        $this->pinnedName = $pinnedName;
    }
}
