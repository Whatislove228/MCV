<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 06.04.18
 * Time: 10:01
 */
class ContactController
{
    public function actionIndex()
    {
        require_once (ROOT . "/views/contact/index.php");
        return true;
    }
}