<?php

class NewsController
{
    public function actionIndex()
    {
        $newsList = array();
        $newsList = News::getNewsList();
        $categories = Category::getCategoriesList();
        require_once (ROOT. "/views/news/index.php");
        return true;
    }
    public function actionView($id)
    {
        if($id) {
            $newsItem = News::getNewsItemByID($id);
            require_once(ROOT . "/views/news/view.php");
        }
        return true;
    }

}