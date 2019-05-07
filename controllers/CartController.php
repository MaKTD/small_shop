<?php

class CartController
{
    public function actionIndex()
    {

        $category = array();
        $category = Category::getCategoryList();

        $productsInCart = false;


        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        include_once ROOT.'/views/cart/index.php';

        return true;
    }


    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];

        header('Location: '.$referer);
    }

    public function actionDelete($id)
    {

        Cart::deleteProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];

        header('Location: '.$referer);

    }
}