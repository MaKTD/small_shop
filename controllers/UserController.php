<?php

class UserController
{
    public function actionRegister()
    {   
        $name = '';
        $pass = '';
        $email = '';
        $errorMessage = false;
        $result = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];

            if (!User::checkName($name)) {
                $errorMessage[] = 'Имя должно быть больше 2-х символов';
            }
            if (!User::checkPass($pass)) {
                $errorMessage[] = 'Пароль должен быть более 6-ти символов';
            }
            if (!User::checkEmail($email)) {
                $errorMessage[] = 'Email неправильный';
            }

            if (!User::checkEmailExists($email)) {
                $errorMessage[] = 'Email уже зарегестрирован';
            }

            if ($errorMessage == false) {
                $result = User::register($name, $email, $pass);
            }
        }

        include_once ROOT.'/views/user/register.php';

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $pass = '';
        $errorMessage = false;

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            // Validation 
            if (!User::checkEmail($email)) {
                $errorMessage[] = 'Email неправильный';
            }
            if (!User::checkPass($pass)) {
                $errorMessage[] = 'Пароль должен быть более 6-ти символов';
            }

            // chek User Exists
            $userId = User::checkUserExist($email, $pass);

            if ($userId == false) {
                $errorMessage[] = 'Email или пароль не верны, попробуйте ещё раз';
            } else {
                // remeber user in session

                User::auth($userId);
                header('Location: /cabinet/');

                //header("Location: /cabinet/");
            }
        }

        include_once ROOT.'/views/user/login.php';


        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header('Location: /');
    }
}