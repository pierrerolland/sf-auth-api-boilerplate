<?php

namespace App\Controller;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Controller extends AbstractController
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    protected function handleBasicCollection(string $className, array $where = [], array $orderBy = []): Response
    {
        $collection = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository($className)
            ->findBy($where, $orderBy);

        $serialized = $this->serializer->serialize($collection, 'json');

        return $this->handleSerializedResponse($serialized);
    }

    /**
     * @param array|object $object
     */
    protected function handleResponse($object, int $statusCode = Response::HTTP_OK, array $groups = []): Response
    {
        $context = $groups ? SerializationContext::create()->setGroups($groups) : null;
        $serialized = $this->serializer->serialize($object, 'json', $context);

        return $this->handleSerializedResponse($serialized, $statusCode);
    }

    protected function handleSerializedResponse(string $serialized, int $statusCode = Response::HTTP_OK): Response
    {
        return new Response($serialized, $statusCode, ['Content-type' => 'application/json']);
    }
}
