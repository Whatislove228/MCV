<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06.04.2018
 * Time: 21:37
 */

class CartController
{
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Получим идентификаторы и количество товаров в корзине
        $productsInCart = Cart::getProducts();
        if ($productsInCart) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInCart);
            // Получаем массив с полной информацией о необходимых товарах
            $products = Product::getProductsByIds($productsIds);
            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }
        // Подключаем вид
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }
}