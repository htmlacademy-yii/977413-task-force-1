<?php

namespace HtmlAcademy\Exceptions;

use AssertionError;

require_once './vendor/autoload.php';

class StatusErrorException extends AssertionError
{
    protected $message = 'Сделанное действие не вернет заданный статус!';
}
