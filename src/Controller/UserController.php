<?php

namespace App\Controller;

use App\Entity\User;
use App\Manager\UserManager;
use JMS\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @var UserManager
     */
    private $userManager;

    public function __construct(UserManager $userManager, SerializerInterface $serializer)
    {
        parent::__construct($serializer);

        $this->userManager = $userManager;
    }

    /**
     * @Route("/login", methods={"POST"})
     */
    public function login(): JsonResponse
    {
        return new JsonResponse();
    }

    /**
     * @Route("/me", methods={"GET"})
     */
    public function me(): Response
    {
        return $this->handleResponse($this->getUser());
    }

    /**
     * @Route("/register", methods={"POST"})
     *
     * @ParamConverter(
     *     name="user",
     *     class="App\Entity\User",
     *     converter="rollandrock_entity_converter"
     * )
     */
    public function register(User $user): Response
    {
        return $this->handleResponse($this->userManager->register($user));
    }
}
