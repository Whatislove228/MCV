<?php

class UserController
{

    public function actionRegister()
    {

        $name =  '';
        $surname =  '';
        $password =  '';
        $email =  '';
        $result = false;

        if(isset($_POST['submit']))
        {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['password'];
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

        if(!User::checkPassword($password)) {
            $errors[] = "Пароль не может содержать кириллицу";
        }
        if(User::checkEmailExists($email))
        {
            $errors[] = "Такой email уже существует";
        }
        if($errors == false)
        {
            $result = User::register($name,$surname, $email, $password);
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

        unset($_SESSION['user']);
        header("Location: /");
    }
    

}
