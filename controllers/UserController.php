<?php

class UserController
{

    public function actionRegister()
    {

        $name =  '';
        $surname =  '';
        $password =  '';
        $phone =  '';
        $email =  '';
        $result = false;

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];


        }
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
        if(!User::checkPhone($phone)) {
            $errors[] = "Номер телефона должен быть вида 097 112 67 00";
        }
        if(!User::checkPassword($password)) {
            $errors[] = "Пароль не может содержать кириллицу";
        }
        if(User::checkEmailExists($email))
        {
            $errors[] = "Такой email уже существует";
        }
        if($errors == false)
        {
            $result = User::register($name,$surname, $email, $password, $phone);
        }



        require_once(ROOT . '/views/user/register.php');

        return true;
    }
    
    public function actionLogin()
    {

        $email = "";
        $password = "";



        if(isset($_POST['submit']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;

            //Validation

            if(!User::checkEmail($email))
            {
                $errors[] = "Такого Email не существует";
            }
            if(!User::checkPassword($password))
            {
                $errors[] = "Пароль не должен быть короче 6 символов";
            }

            $userId = User::checkUserData($email,$password);
            if($userId==false)
            {
                $errors[] = 'Неправильные данные для входа';
            }else{
    
                User::auth($userId);

                header("Location: /news/");
            }



        }


        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    public function actionLogout()
    {
        session_start();
        unset($_SESSION['user']);
        header("Location: /");
    }
    

}
