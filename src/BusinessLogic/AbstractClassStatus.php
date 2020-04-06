<?php

namespace HtmlAcademy\BusinessLogic;

require_once './vendor/autoload.php';

abstract class AbstractClassStatus
{
    protected static $next = [];

    abstract public static function getStatusName(): string;


    public static function getActions() : array
    {
        return self::$next;
    }

    public static function canBeChangedTo(AbstractClassStatus $status) : bool
    {
        if (!isset($status::$next)) {
            return FALSE;
        }
        return TRUE;
    }
}
