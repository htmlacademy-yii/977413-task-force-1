<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;

require_once './vendor/autoload.php';

class RespondAction extends AbstractClassAction
{
    public static function getActionName() : string
    {
        return 'Откликнуться';
    }

    public static function getInteriorName() : string
    {
        return 'act_respond';
    }

    public static function RoleCheck(int $user_id,string $task_status,bool $availability=null) : bool
    {
        if($task_status == 'NEW') {
            if($user_id == 'worker_id') {
                if($availability == TRUE) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
}
