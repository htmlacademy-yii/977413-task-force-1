<?php

namespace HtmlAcademy\BusinessLogic;

use HtmlAcademy\BusinessLogic\AbstractClassAction;


require_once './vendor/autoload.php';

class RefuseAction extends AbstractClassAction
{
    public static function getActionName() : string
    {
        return 'Отказаться';
    }

    public static function getInteriorName() : string
    {
        return 'act_refuse';
    }

    public static function RoleCheck(int $user_id,string $task_status,bool $availability=null) : bool
    {
        if($task_status == 'IN_WORKING') {
            if($user_id == 'worker_id') {
                return TRUE;
            }
        }
        return FALSE;
    }
}
