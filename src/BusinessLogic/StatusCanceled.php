<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassStatus;

class StatusCanceled extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Отменено';
    }

    public static $next = NULL;
}
