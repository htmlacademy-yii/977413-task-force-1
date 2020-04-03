<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class UndefinedFileException extends Exception
{
    protected $message = 'Такого файла нету';
}
