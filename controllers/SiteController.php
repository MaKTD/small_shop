<?php





class SiteController 
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(10);

        require_once ROOT.'/views/site/index.php';

        return true;
    }

    public function actionContact()
    {

        include_once ROOT.'/views/site/contact.php';

        return true;
    }
}