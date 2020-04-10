<?php

namespace HtmlAcademy\BusinessLogic\Actions;

use HtmlAcademy\BusinessLogic\Statuses\StatusDone;

require_once './vendor/autoload.php';

class DoneAction extends AbstractClassAction
{
    protected $actionStatus = StatusDone::class;

    public static function getActionName(): string
    {
        return 'Выполнено';
    }

    public function getInteriorName(): string
    {
        return 'act_done';
    }

    public function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
            return ($user_id == $customer_id);
    }
}


