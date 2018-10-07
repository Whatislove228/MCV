<?php

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
    public static function isAdmin(){
        $userId = User::isLogged();

        $user = User::getUserById($userId);

        if($user['role'] == 'admin')
        {
            return true;
        }
    }
}