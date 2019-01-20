<?php

namespace App\Exception;

class UserHasMissingFieldsException extends Exception
{
    public $exceptionCode = 101;
    public $exceptionStatus = 'missing_fields';
}
