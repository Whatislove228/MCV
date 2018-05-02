<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 22.03.18
 * Time: 13:56
 */
class Category
{
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $CategoryList = array();

        $result = $db->query('SELECT id, name FROM `category` ORDER BY sort_order ASC');

        $i = 0;
        while ($row = $result->fetch()) {
            $CategoryList[$i]['id'] = $row['id'];
            $CategoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $CategoryList;
    }

}
