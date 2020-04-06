<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassStatus;

class StatusDone extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Выполнено';
    }

    public static $next = NULL;
}
