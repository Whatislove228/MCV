<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 03.04.18
 * Time: 20:30
 */
class User
{

    public static function register($name,$surname, $email, $password, $phone) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name,surname, email, password, phone) '
            . 'VALUES (:name,:surname, :email, :password, :phone)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if(strlen($name) >=2)
        {
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        if(strlen($password) >=6 && preg_match('/^[A-Za-z]+$/',$password))
        {
            return true;
        }
        return false;
    }
    public static function checkSurname($surname)
    {
        if(strlen($surname) >= 2)
        {
            return true;
        }
        return false;
    }
    public static function checkPhone($phone)
    {
        
        if(strlen($phone) == 10)
        {
            return true;
        }
        return false;
    }
    public static function checkEmail($email)
    {
        if($email)
        {
            return true;
        }
        return false;

    }
    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $db->prepare($sql);
        $result ->bindParam(":email",$email,PDO::PARAM_STR);
        $result ->execute();

        if($result->fetchColumn())
            return true;
        return false;
    }

}