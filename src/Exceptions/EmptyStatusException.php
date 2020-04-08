<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class EmptyStatusException extends Exception
{
    protected $message = 'Статус пуст';
}
