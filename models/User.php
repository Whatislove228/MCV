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
        if(strlen($password) >=6 && !preg_match('/^[А-Яа-я]+$/',$password))
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
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM user WHERE email = :email AND password  = :password";

        $result = $db->prepare($sql);
        $result ->bindParam(":email",$email,PDO::PARAM_INT);
        $result ->bindParam(":password",$password,PDO::PARAM_INT);
        $result ->execute();

        $user = $result->fetch();
        if($user)
        {
            return $user['id'];
        }

        return false;
    }
    public static function auth($userId)
    {
        $_SESSION["user"] = $userId;
    }
    public static function checkLogged()
    {
        
        if(isset($_SESSION["user"]))
        {
            return $_SESSION['user'];
        }
        //header("Location: /user/login");
    }
    
    public static function isGuest()
    {
        if(isset($_SESSION['user']))
        {
            return false;
        }
        return true;
    }
    public static function getUserById($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = "SELECT * FROM user WHERE id = :id";

            $result = $db->prepare($sql);

            $result->bindParam(':id',$id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $result->execute();

            return $result->fetch();
        }
    }

    public static function edit($id, $name, $surname,$email,$password,$phone)
    {
        $db = Db::getConnection();
        $sql = "UPDATE user SET name = :name,surname = :surname, email = :email, password = :password, phone = :phone WHERE id = :id";

        $result = $db->prepare($sql);

        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':surname',$surname,PDO::PARAM_STR);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->bindParam(':phone',$phone,PDO::PARAM_STR);



        return $result->execute();
    }
    public static function delete($id)
    {
        $db = Db::getConnection();

        $sql = "DELETE FROM user WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        unset($_SESSION['user']);
    }
    

}