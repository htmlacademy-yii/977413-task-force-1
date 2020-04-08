<?php

namespace HtmlAcademy\BusinessLogic\Actions;

use HtmlAcademy\BusinessLogic\Statuses\StatusCanceled;

require_once './vendor/autoload.php';

class CancelAction extends AbstractClassAction
{
    protected $actionStatus = StatusCanceled::class;

    public function getActionName(): string
    {
        return 'Отменить';
    }

    public function getInteriorName(): string
    {
        return 'act_cancel';
    }

    public function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
        return ($user_id == $customer_id);
    }
}
