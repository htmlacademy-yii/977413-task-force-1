<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class CancelAction extends AbstractClassAction
{
    public static function getActionName(): string
    {
        return 'Отменить';
    }

    public static function getInteriorName(): string
    {
        return 'act_cancel';
    }

    public static function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
        if ($user_id == $customer_id) {
            return TRUE;
        }
        return FALSE;
    }
}
