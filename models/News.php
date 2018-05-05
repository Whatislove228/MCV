<?php


class News
{

    /** Returns single news items with specified id
     * @rapam integer &id
     */

    public static function getNewsItemByID($id)
    {
        $id = intval($id);

        if ($id) {


            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM news WHERE id=' . $id);

            $newsItem = $result->fetch();


        }
        return $newsItem;


    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList($page) {
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * $limit;
        if(isset($_POST['button'])) {
            $flag = $_POST['button'];
        }else {
            $flag = 'id';
        }
        $db = Db::getConnection();
        $newsList = array();
        $result = $db->query("SELECT id, title, date, author_name,preview ,short_content FROM news ORDER BY $flag DESC LIMIT ". $limit ."  OFFSET " . $offset);

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['preview'] = $row['preview'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;

    }

    public static function getTotalNewsCount()
    {
        $db = Db::getConnection();

        $result  = $db->query("SELECT count(id) AS count FROM phpshop.news");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
    public static function dataSort($page)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * $limit;
        $db = Db::getConnection();
        $limit = Product::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * $limit;
        $db = Db::getConnection();
        $newsList = array();
        $result = $db->query("SELECT id, title, date, author_name,preview ,short_content FROM news ORDER BY data ASC LIMIT ". $limit ."  OFFSET " . $offset);

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['preview'] = $row['preview'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }

}