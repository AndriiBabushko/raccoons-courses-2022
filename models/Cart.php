<?php

namespace models;

use core\Core;

class Cart
{
    protected static string $tableName = "Cart";

    public static function addCart(array $tableFields = null): bool
    {
        return Core::getInstance()->db->insert(self::$tableName, $tableFields);
    }

    public static function updateCartByUserID(int $id_user, array $tableFields): bool
    {
        return Core::getInstance()->db->update(self::$tableName, $tableFields, [
            'id_user' => $id_user
        ]);
    }

    public static function getCartGoodsByUserID($id_user): mixed
    {
        $cart = Core::getInstance()->db->select(self::$tableName, 'goods', [
            'id_user' => $id_user
        ]);

        if (!empty($cart))
            return $cart[0]['goods'];

        return null;
    }

    public static function getCartByUserId(int $id_user): mixed
    {
        $cart = Core::getInstance()->db->select(self::$tableName, '*', [
            'id_user' => $id_user
        ]);

        if (!empty($cart))
            return $cart[0];

        return null;
    }

    public static function isGoodInCart($id_user, $id_good): bool
    {
        $cartGoods = self::getCartGoodsByUserID($id_user);

        if ($cartGoods !== null) {
            $cartGoods = unserialize($cartGoods);

            if(is_array($cartGoods))
                foreach ($cartGoods as $cartGood) {
                    if ($cartGood['id_good'] == $id_good)
                        return true;
                }

            return false;
        }

        return false;
    }
}