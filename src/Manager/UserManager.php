<?php

namespace App\Manager;

use App\Entity\User;
use App\Exception\UserAlreadyExistsException;
use App\Exception\UserHasMissingFieldsException;
use App\Repository\UserRepository;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserManager
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    public function __construct(UserRepository $userRepository, EncoderFactoryInterface $encoderFactory)
    {
        $this->userRepository = $userRepository;
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @throws UserAlreadyExistsException
     * @throws UserHasMissingFieldsException
     */
    public function register(User $user): User
    {
        if (empty($user->getEmail()) || empty($user->getUsername()) || empty($user->getPassword())) {
            throw new UserHasMissingFieldsException();
        }

        if (null !== $this->userRepository->findOneByEmailOrUsername($user)) {
            throw new UserAlreadyExistsException();
        }

        $user->setPassword($this->encoderFactory->getEncoder(User::class)->encodePassword($user->getPassword(), ''));
        $this->userRepository->save($user);

        return $user;
    }
}
