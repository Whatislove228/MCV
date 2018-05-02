<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 12.04.18
 * Time: 23:31
 */
class AdminController extends  AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        
        require_once (ROOT."/views/admin/index.php");
        return true;
    }
}