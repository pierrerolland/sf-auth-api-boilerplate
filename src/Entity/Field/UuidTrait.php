<?php

namespace App\Entity\Field;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=36)
     * @ORM\Id
     */
    private $id;

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @ORM\PrePersist
     *
     * @throws \Exception
     */
    public function onPrePersistCreateUuid(): void
    {
        $this->id = Uuid::uuid4()->toString();
    }
}
