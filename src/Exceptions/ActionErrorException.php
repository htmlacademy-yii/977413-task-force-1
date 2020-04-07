<?php

namespace HtmlAcademy\Exceptions;

use AssertionError;

require_once './vendor/autoload.php';

class ActionErrorException extends AssertionError
{
    protected $message = 'В данного статуса нету доступных действий!';
}
