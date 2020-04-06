<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassStatus;

class StatusNew extends AbstractClassStatus
{
    public static function getStatusName(): string
    {
        return 'Новое';
    }

    public static $next = [StatusInWork::class, StatusCanceled::class];
}
