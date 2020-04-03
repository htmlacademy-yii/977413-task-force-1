<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class SourceFileException extends Exception
{
    protected $message = 'Файл не существует';
}

// Этот тип исключения нужен для ошибок, связанных с недоступностью csv файла на чтение

