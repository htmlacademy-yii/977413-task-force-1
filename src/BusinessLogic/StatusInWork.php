<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassStatus;

class StatusInWork extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'В работе';
    }

    public static $next = [StatusDone::class, StatusFailed::class];
}
