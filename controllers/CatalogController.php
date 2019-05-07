<?php



class CatalogController
{
    public function actionIndex()
    {
        $category = array();
        $category = Category::getCategoryList(5);

        $productList = array();
        $productList = Product::getLatestProducts(8);

        include_once ROOT.'/views/catalog/index.php';
        return true;
    }
    public function actionCategory($categoryId, $page = 1)
    {

        $category = array();
        $category = Category::getCategoryList(5);


        $categotyProducts = array();
        $categotyProducts = Product::getProductsFromCategory($categoryId, $page);

        $total = Product::getTotalProductsInCategory($categoryId);
        // creating pagination object using Pagintation class
        $pagination = new Pagination($total, $page, Product::DEFAULT_AMOUNT, 'page-');

        include_once ROOT.'/views/catalog/category.php';
        return true;

    }
}