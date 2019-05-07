<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);


        include_once ROOT.'/views/cabinet/index.php';

        return true;
    }

    public function actionEdit()
    {

        $userId = User::checkLogged();

        $user = User::getUserById($userId);
        
        $errorMessage = false;
        $result = false;

        $name = $user['name'];
        $pass = $user['password'];

        if (isset($_POST['submit'])) {
            
            $name = $_POST['name'];
            $pass = $_POST['password'];

            if (!User::checkName($name)) {
                $errorMessage[] = 'Имя должно быть больше 2-х символов';
            }

            if (!User::checkPass($pass)) {
                $errorMessage[] = 'Пароль должен быть более 6-ти символов';
            }

            if ($errorMessage == false) {
                $result = User::edit($userId, $name, $pass);
            }

        }

        include_once ROOT.'/views/cabinet/edit.php';

        return true;
    }
}