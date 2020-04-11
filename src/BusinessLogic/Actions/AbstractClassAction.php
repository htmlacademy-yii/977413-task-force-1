<?php

namespace HtmlAcademy\BusinessLogic\Actions;

require_once './vendor/autoload.php';

abstract class AbstractClassAction
{
    protected $actionStatus;

    public function getActionStatus() : string
    {
        return $this->actionStatus;
    }

    abstract public static function getActionName(): string;

    abstract public function getInteriorName(): string;

    public function getClassName(): string
    {
        return static::class;
    }

    abstract public function roleCheck(int $user_id, int $customer_id, int $worker_id): bool;
}
