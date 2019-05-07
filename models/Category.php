<?php


class Category
{
    const SHOW_BY_DEFAULT = 10; 

    public static function getCategoryList($count = self::SHOW_BY_DEFAULT)
    {
        $count = (int)$count;
        $db = Db::getConnection();

        $sql = 'SELECT id,name FROM category WHERE status=1 ORDER BY sort_order ASC LIMIT '.$count;
        $result = $db->query($sql);
        $categoryList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categoryList;
    }

    public static function getCategotyListAll()
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM category ORDER BY sort_order ASC';
        $result = $db->query($sql);
        $categoryList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $categoryList;
    }
}