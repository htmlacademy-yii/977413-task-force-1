<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class SourceFileException extends Exception
{

}

// Этот тип исключения нужен для ошибок, связанных с недоступностью csv файла на чтение

