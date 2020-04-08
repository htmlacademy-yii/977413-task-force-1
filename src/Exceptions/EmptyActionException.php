<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class EmptyActionException extends Exception
{
    protected $message = 'Действий для текущего статуса нету!';
}
