<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class RespondAction extends AbstractClassAction
{
    public static function getActionName(): string
    {
        return 'Откликнуться';
    }

    public static function getInteriorName(): string
    {
        return 'act_respond';
    }

    public static function roleCheck(int $user_id, int $customer_id, int $worker_id): bool
    {
        if ($user_id == $worker_id) {
            return TRUE;
        }
        return FALSE;
    }
}
