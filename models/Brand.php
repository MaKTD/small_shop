<?php


class Brand
{

    public static function getBrandListAll()
    {

        $db = Db::getConnection();

        $sql = "SELECT * FROM brand ORDER BY id ASC";
        $result = $db->query($sql);
        $categoryList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categoryList;
    }
}