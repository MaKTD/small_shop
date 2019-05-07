<?php

class Product
{

    const DEFAULT_AMOUNT = 4; 


    public static function getLatestProducts( $caunt = self::DEFAULT_AMOUNT)
    {
        $caunt = (int)$caunt;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, image FROM product WHERE status=1 '
            .'ORDER BY id DESC '
            .'LIMIT '.$caunt;

        $result = $db->query($sql);
        $productList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $productList;
    }


    public static function getProductsFromCategory($categoryId, $page = 1, $caunt = self::DEFAULT_AMOUNT)
    {

        $page = (int)$page;
        $caunt = (int)$caunt;
        $categoryId = (int)$categoryId;
        $offset = ($page - 1) * $caunt;


        $db = Db::getConnection();

        $sql = 'SELECT id, name, price, image FROM product '
            .'WHERE status=1 and category_id='.$categoryId
            .' ORDER BY id DESC'
            .' LIMIT '.$caunt
            .' OFFSET '.$offset;

        $result = $db->query($sql);
        $categoryProducts = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categoryProducts;
    }


    public static function getProductById($id)
    {
        $id = (int)$id;

        $db = Db::getConnection();

        $sql = 'SELECT * FROM product where id='.$id;

        $result = $db->query($sql);
        $product = $result->fetch(PDO::FETCH_ASSOC);
        return $product;

    }

    public static function getProductsByIds($productIds)
    {
        $products = array();

        $db = Db::getConnection();
        $idsString = implode(',', $productIds);

        $sql = "SELECT * FROM product WHERE status=1 AND id IN ($idsString)";

        $result = $db->query($sql);
        $products = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    }

    public static function getTotalProductsInCategory($categoryId) 
    {
        $categoryId = (int)$categoryId;

        $db = Db::getConnection();

        $sql = 'SELECT count(id) AS count FROM product where status=1 AND category_id='.$categoryId;

        $result = $db->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row['count'];
    }

    public static function getProductsList()
    {
        $db = Db::getConnection();

        $sql = 'SELECT id,name,price, code FROM product ORDER BY id ASC';

        $result = $db->query($sql);
        $productsList = $result->fetchAll(PDO::FETCH_ASSOC);
        
        return $productsList;
    }

    public static function deleteProductById($id)
    {

        $db = Db::getConnection();

        $sql = 'DELETE FROM product WHERE id = :id';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();

    }
    public static function createProduct($good)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product '
            .'(name, category_id, code, price, availability, brand_id, description, is_new, is_recomended, status) '
            .'VALUES '
            .'(:name, :categoryId, :code, :price, :availability, :brand_id, :description, :is_new, :is_recomended, :status)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $good['name'], PDO::PARAM_STR);
        $stmt->bindParam(':categoryId', $good['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':code', $good['code'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $good['price'], PDO::PARAM_INT);
        $stmt->bindParam(':availability', $good['availability'], PDO::PARAM_INT);
        $stmt->bindParam(':brand_id', $good['brand_id'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $good['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $good['if_new'], PDO::PARAM_INT);
        $stmt->bindParam(':is_recomended', $good['if_recomended'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $good['status'], PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            return $db->lastInsertId();
        }
    }

    public static function updateProductById($id, $good)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE product
            SET
                name = :name,
                code = :code,
                price = :price,
                category_id = :category_id,
                brand_id = :brand_id,
                availability = :availability,
                description = :description,
                is_new = :is_new,
                is_recomended = :is_recomended,
                status = :status
            WHERE id = :id';

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':name', $good['name'], PDO::PARAM_STR);
        $stmt->bindParam(':code', $good['code'], PDO::PARAM_STR);
        $stmt->bindParam(':price', $good['price'], PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $good['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':brand_id', $good['brand_id'], PDO::PARAM_INT);
        $stmt->bindParam(':availability', $good['availability'], PDO::PARAM_INT);
        $stmt->bindParam(':description', $good['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $good['if_new'], PDO::PARAM_INT);
        $stmt->bindParam(':is_recomended', $good['if_recomended'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $good['status'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function getImage($id)
    {

        $default = 'default.jpg';
        $path = '/upload/images/products/';

        $pathToImg = $path.$id.'.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToImg)) {
            return $pathToImg;
        }
        return $path.$default;
    }
};
