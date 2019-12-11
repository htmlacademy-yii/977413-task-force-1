<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class UndefinedRoleException extends Exception
{
    protected $message = 'Такой роли нету';
}
