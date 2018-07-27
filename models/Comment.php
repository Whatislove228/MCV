<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 01.05.2018
 * Time: 23:43
 */

class Comment
{

    public static function checkComment($userComment)
    {
        if(strlen($userComment)>0)
        {
            return true;
        }
        return false;
    }
    public static function showComment($productId,$page = 1)
    {
        $commentList = array();
        $page = intval($page);
        $offset = ($page - 1) * 6;
        $db = Db::getConnection();
        $result = $db->query("SELECT id, product_id, user_id, commentator_name,comment_data ,comment_text,respect FROM `comment` WHERE product_id = $productId ORDER BY respect DESC LIMIT 6 OFFSET $offset");
        $i = 0;
        if($result) {
            while ($row = $result->fetch()) {
                $commentList[$i]['id'] = $row['id'];
                $commentList[$i]['product_id'] = $row['product_id'];
                $commentList[$i]['user_id'] = $row['user_id'];
                $commentList[$i]['commentator_name'] = $row['commentator_name'];
                $commentList[$i]['comment_data'] = $row['comment_data'];
                $commentList[$i]['comment_text'] = $row['comment_text'];
                $commentList[$i]['respect'] = $row['respect'];
                $i++;
            }
            return $commentList;
        }
    }
    public static function countCommentByProductId($productId)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM `comment` WHERE product_id = '$productId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
    public static function respect($productId,$id)
    {
        $db = Db::getConnection();
        $sql = "UPDATE `comment` SET respect = respect + 1  WHERE product_id = '$productId' AND id = $id";
        $result = $db->prepare($sql);
        $result->execute();
    }
    public static function countCommentByUserId($userId)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id) AS count FROM `comment` WHERE user_id = '$userId'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function userComment($userId,$page = 1)
    {
        $page = intval($page);
        $offset = ($page - 1) * 10;
        $db = Db::getConnection();
        $sql = "SELECT id,comment_data,comment_text FROM `comment` WHERE user_id = '$userId' LIMIT 10 OFFSET $offset";
        $result = $db->prepare($sql);
        $result->execute();
        $i = 0;
        while($row = $result->fetch())
        {
            $commentList[$i]['id'] = $row['id'];
            $commentList[$i]['comment_data'] = $row['comment_data'];
            $commentList[$i]['comment_text'] = $row['comment_text'];
            $i++;
        }
        return $commentList;
    }
}