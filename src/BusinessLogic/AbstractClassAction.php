<?php

namespace HtmlAcademy\BusinessLogic;

require_once './vendor/autoload.php';

abstract class AbstractClassAction
{
    abstract public static function getActionName(): string;

    abstract public static function getInteriorName(): string;

    public static function getClassName(): string
    {
        return static::class;
    }

    abstract public static function roleCheck(int $user_id, int $customer_id, int $worker_id): bool;
}

//string $task_status, bool $availability = null
