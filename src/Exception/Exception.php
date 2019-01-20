<?php

namespace App\Exception;

class Exception extends \Exception
{
    public $exceptionCode = -1;
    public $exceptionStatus = '';
}
