<?php

namespace HtmlAcademy\BusinessLogic\Actions;

use HtmlAcademy\BusinessLogic\Statuses\StatusFailed;

require_once './vendor/autoload.php';

class RefuseAction extends AbstractClassAction
{
    protected $actionStatus = StatusFailed::class;

    public function getActionName(): string
    {
        return 'Отказаться';
    }

    public function getInteriorName(): string
    {
        return 'act_refuse';
    }

    public function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
        return ($user_id == $customer_id);
    }
}
