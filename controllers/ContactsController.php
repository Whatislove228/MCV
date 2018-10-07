<?php

/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 06.04.18
 * Time: 10:01
 */
class ContactsController
{
    public function actionIndex($page = 1)
    {
        $newsList = array();
        $newsList = News::getNewsList($page);
        $categories = Category::getCategoriesList();
        $total = News::getTotalNewsCount();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT,'page-');
        require_once (ROOT . "/views/contact/index.php");
        return true;
    }
}