<?php

class AdminController extends AdminBase
{
    public function actionIndex()
    {

        // Cheking rights
        self::CheckAdmin();

        include_once ROOT.'/views/admin/index.php';

        return true;
    }
}