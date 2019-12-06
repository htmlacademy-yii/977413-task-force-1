<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;


require_once './vendor/autoload.php';

class DoneAction extends AbstractClassAction
{
    public static function getActionName(): string
    {
        return 'Выполнено';
    }

    public static function getInteriorName(): string
    {
        return 'act_done';
    }

    public static function roleCheck(int $user_id, string $task_status, bool $availability = null): bool
    {
        if ($task_status == 'IN_WORKING') {
            if ($user_id == 'customer_id') {
                return TRUE;
            }
        }
        return FALSE;
    }
}


