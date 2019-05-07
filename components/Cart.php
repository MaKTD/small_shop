<?php

class Cart
{
    public static function addProduct($id)
    {
        $id = (int)$id;

        $productsInCart = array();

        // if there were good in bucket
        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        //
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id] ++;
        } else {
            $productsInCart[$id] = 1;
        }

        $_SESSION['products'] = $productsInCart;
    }


    public static function deleteProduct($id)
    {
        $id = (int)$id;

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }

        if (array_key_exists($id, $productsInCart)) {
            unset($productsInCart[$id]);
        }
        
        $_SESSION['products'] = $productsInCart;
    }

    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }


    public static function countItemsInCart()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        $total = 0;
        if ($productsInCart) {
            foreach ($products as $product) {
                $total += $product['price'] * $productsInCart[$product['id']];
            }
        }

        return $total;
    }
}