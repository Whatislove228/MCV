<?php

class NewsController
{
    public function actionIndex($page = 1)
    {

        $newsList = array();
        $newsList = News::getNewsList($page);
        $categories = Category::getCategoriesList();
        $total = News::getTotalNewsCount();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT,'page-');
        require_once (ROOT. "/views/news/index.php");
        return true;
    }
    public function actionView($id)
    {
        $categories = Category::getCategoriesList();
        if($id) {
            $newsItem = News::getNewsItemByID($id);
            require_once(ROOT . "/views/news/view.php");
        }
        return true;
    }

}