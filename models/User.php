<?php

class User
{
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password )';

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public static function edit($userId, $name, $password) 
    {

        $db = Db::getConnection();

        $sql = "UPDATE user SET name= :name, password = :pass where id = :userId";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $password, PDO::PARAM_STR);

        return $stmt->execute();
    }





    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }


    public static function checkLogged()
    {
        

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header('Location: /user/login');
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }


    public static function getUserById($userId)
    {
        if ($userId) {
            $db = Db::getConnection();

            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $result->execute();

            return $result->fetch();

        }
    }


    public static function checkName($name) 
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }


    public static function checkPass($pass) 
    {
        if (strlen($pass) >= 6) {
            return true;
        }
        return false;
    }


    public static function checkEmail($email) 
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }


    public static function checkEmailExists($email) 
    {
        $db = Db::getConnection();

        $sql = 'SELECT email FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if(!$result->fetch())
            return true;
        return false;
    }

    public static function checkUserExist($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;


    }
}