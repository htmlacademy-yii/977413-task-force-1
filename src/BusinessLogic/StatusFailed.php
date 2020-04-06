<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassStatus;

class StatusFailed extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Провалено';
    }

    public static $next = NULL;
}
