<?php



class ProductController
{
    public function actionView($id)
    {
        $id = (int)$id;

        $category = array();
        $category = Category::getCategoryList();

        $product = array();
        $product = Product::getProductById($id);



        include_once ROOT.'/views/product/view.php';

        return true;
    }
}