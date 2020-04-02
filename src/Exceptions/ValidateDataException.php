<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class ValidateDataException extends Exception
{
    protected $message = 'Дынные либо не являеюся массивом, либо не формата CSV';
}
