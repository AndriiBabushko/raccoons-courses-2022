<?php

namespace controllers;

use core\Controller;
use core\Utils;
use models\Cart;
use models\Good;
use models\User;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(): bool|string
    {
        if (!User::isUserAuth())
            $this->redirect('/');

        //echo "<pre>";
        $errors = [];
        $id_user = intval(User::getCurrentAuthUser()['id_user']);

        if (isset($_GET['id_good'])) {
            $id_good = intval($_GET['id_good']);
            $good = Good::getGoodById($id_good);

            if (!Cart::isGoodInCart($id_user, $id_good)) {
                $cartGoods = Cart::getCartGoodsByUserID($id_user);
                if ($cartGoods !== null)
                    $goods = unserialize($cartGoods);

                if (!empty($goods))
                    $goods[] = $good;
                else
                    $goods = [$good];

                $model = ['goods' => serialize($goods)];
                $cartUpdateStatus = Cart::updateCartByUserID($id_user, $model);

                if ($cartUpdateStatus) {
                    return $this->render(null, [
                        'goods' => $goods,
                        'errors' => $errors
                    ]);
                } else {
                    $errors += Utils::generateError('somethingWrong', [
                        'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                        'eng' => 'Something went wrong! Try again!'
                    ]);
                }
            } else {
                $errors += Utils::generateError('goodExists', [
                    'ukr' => 'Даний товар вже існує в корзині! Поверніться та виберіть інший.',
                    'eng' => 'This product already exists in the basket! Go back and choose another one.'
                ]);
            }
        }

        return $this->render(null, [
            'errors' => $errors,
            'goods' => unserialize(Cart::getCartGoodsByUserID($id_user))
        ]);
    }

    public function deleteAction()
    {


        return $this->renderView("index");
    }
}