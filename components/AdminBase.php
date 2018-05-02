<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 12.04.18
 * Time: 23:14
 */
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if($user['role'] == 'admin')
        {
            return true;
        }
        die("Access denied");
    }
}