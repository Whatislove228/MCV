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
            $errors[] = "Пароль может содержать латнские буквы и все символы(!№;%:?* и т.д)";
        }
        if(User::checkEmailExists($email))
        {
            $errors[] = "Такой email уже существует";
        }
        var_dump($errors);
        if($errors == false)
        {
            echo "Ok";
            $result = User::register($name,$surname, $email, $password, $phone);
            header("Location:" . $_SERVER['REQUEST_URI'] );
        }




        require_once(ROOT . '/views/user/register.php');

        return true;
    }

}
