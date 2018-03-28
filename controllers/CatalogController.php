<?php
require_once (ROOT . "/models/Category.php");
require_once (ROOT . "/models/Product.php");
class CatalogController
{
    public function actionIndex()
    {

        $categories = array();
        $categories = Category::getCategoriesList();
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(9);
        require_once (ROOT . '/views/catalog/index.php');
        return true;

    }
    public function actionCategory($categoryId, $page = 1)
    {
        echo 'Category: ' . $categoryId;
        echo 'Page: ' . $page;

        $categories = array();
        $categories = Category::getCategoriesList();
        $cateryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId,$page);
        require_once (ROOT . '/views/catalog/category.php');
        return true;

    }
}