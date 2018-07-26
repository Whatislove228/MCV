<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 04.04.18
 * Time: 17:45
 */
class AccountController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once (ROOT . '/views/account/index.php');
        return true;
    }
    public function actionEdit()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $name = $user['name'];
        $surname = $user['surname'];
        $email = $user['email'];
        $password = $user['password'];

        $result = false;

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)) {
                $errors[] = "Имя не должно быть короче 2-х символов";
            }
            if(!User::checkSurname($surname)) {
                $errors[] = "Фамилия не должна быть короче 2-х символов";
            }
            if(!User::checkEmail($email)) {
                $errors[] = "Email должен быть вида vasya@gmail.com";
            }
            if(!User::checkPassword($password)) {
                $errors[] = "Пароль не может содержать кириллицу";
            }
            
            if($errors == false)
            {
                $result = User::edit($userId,$name,$surname, $email, $password);
            }
        }


        require_once (ROOT . '/views/account/edit.php');
        return true;
    }
    
    public function actionDelete()
    {
        $userId = User::checkLogged();
        User::delete($userId);
    }
}