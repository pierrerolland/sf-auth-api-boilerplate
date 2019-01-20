<?php

namespace App\Exception;

class UserAlreadyExistsException extends Exception
{
    public $exceptionCode = 100;
    public $exceptionStatus = 'already_exists';
}
