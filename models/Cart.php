<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06.04.2018
 * Time: 21:31
 */

/**
 * Class Cart
 */
class Cart
{
    /**
     * @param $id
     * @return int
     */
    public static function addProduct($id)
    {
        $id = intval($id);

        $productInCart = array();

        if(isset($_SESSION['products']))
        {
            $productInCart  = $_SESSION['products'];
        }

        if(array_key_exists($id,$productInCart))
        {
            $productInCart[$id]++;
        }else{
            $productInCart[$id] = 1;
        }

        $_SESSION['products'] = $productInCart;

        return self::countItems();
    }

    /**
     * @return int
     */
    public static function countItems()
    {
        if(isset($_SESSION['products']))
        {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        }
        else{
            return 0;
        }
    }

    public static function getProducts()
    {
        if(isset($_SESSION['products']))
        {
            return $_SESSION['products'];
        }
        return false;
    }
    public static function getTotalPrice($products)
    {
        $productInCart = self::getProducts();

        $total = 0;

        if($productInCart)
        {
            foreach ($products as $item)
            {
                $total += $item['price'] * $productInCart[$item['id']];
            }
        }
        return $total;
    }
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    /**
     * @param $id
     */
    public static function deleteProduct($id)
    {
        $productsInCart = [];
        $productsInCart = $_SESSION['products'];
        if(array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]--;
        }
        if($productsInCart[$id]<=0){
            unset($productsInCart[$id]);
        }
        $_SESSION['products'] = $productsInCart;
        return self::countItems();
    }
}

