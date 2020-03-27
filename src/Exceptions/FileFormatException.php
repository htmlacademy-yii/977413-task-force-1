<?php

namespace HtmlAcademy\Exceptions;

use Exception;

require_once './vendor/autoload.php';

class FileFormatException extends Exception
{

}

// Этот тип исключения будем использовать для ошибок, связанных с форматом csv файла
