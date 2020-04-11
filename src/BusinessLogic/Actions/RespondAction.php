<?php

namespace HtmlAcademy\BusinessLogic\Actions;

use HtmlAcademy\BusinessLogic\Statuses\StatusInWork;

require_once './vendor/autoload.php';

class RespondAction extends AbstractClassAction
{
    protected $actionStatus = StatusInWork::class;

    public static function getActionName(): string
    {
        return 'Откликнуться';
    }

    public function getInteriorName(): string
    {
        return 'act_respond';
    }

    public function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
        return ($user_id == $customer_id);
    }
}
