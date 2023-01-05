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
            $this->redirect("/user/$this->language/login");

        $errors = [];
        $id_user = intval(User::getCurrentAuthUser()['id_user']);

        if (isset($_GET['id_good'])) {
            $id_good = intval($_GET['id_good']);
            $good = Good::getGoodById($id_good);

            if ($good) {
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
                        $errors += Utils::generateMessage('somethingWrong', [
                            'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                            'eng' => 'Something went wrong! Try again!'
                        ]);
                    }
                } else {
                    $errors += Utils::generateMessage('goodExists', [
                        'ukr' => 'Даний товар вже існує в корзині! Поверніться та виберіть інший.',
                        'eng' => 'This product already exists in the basket! Go back and choose another one.'
                    ]);
                }
            } else {
                $errors += Utils::generateMessage('goodNotExists', [
                    'ukr' => 'Помилка! Даний товар не існує.',
                    'eng' => 'Error! This product does not exist.'
                ]);
            }
        }

        $cartGoods = Cart::getCartGoodsByUserID($id_user);
        if($cartGoods != null)
            return $this->render(null, [
                'errors' => $errors,
                'goods' => unserialize($cartGoods)
            ]);

        return $this->render(null, [
            'errors' => $errors,
            'goods' => []
        ]);
    }

    public function buyAction(): bool|string
    {
        if (!User::isUserAuth())
            $this->redirect("/user/$this->language/login");

        $errors = [];
        $id_user = intval(User::getCurrentAuthUser()['id_user']);
        $cartGoods = Cart::getCartGoodsByUserID($id_user);

        if ($cartGoods !== null)
            $goods = unserialize($cartGoods);

        if (!empty($goods)) {
            $updateUserGoodsStatus = User::updateUser($id_user, ['bought_goods' => serialize($goods)]);

            if (!$updateUserGoodsStatus) {
                $errors += Utils::generateMessage('somethingWrong', [
                    'ukr' => 'Щось пішло не так при оновлені придбаних товарів! Спробуйте ще раз!',
                    'eng' => 'Something went wrong when updating purchased items! Try again!'
                ]);

                return $this->render(null, [
                    'errors' => $errors
                ]);
            }

            Cart::updateCartByUserID($id_user, ['goods' => serialize([])]);

            return $this->render(null, [
                'messages' => Utils::generateMessage('boughtSuccessMessage', [
                    'ukr' => 'Успішно! Ви придбали товар/товари!',
                    'eng' => 'Successfully! You have purchased an item(s)!'
                ])
            ]);
        } else
            $errors += Utils::generateMessage('goodsInCart', [
                'ukr' => 'Попередження! Товарів в корзині немає!',
                'eng' => 'Warning! There are no products in the basket!'
            ]);

        return $this->render(null, [
            'errors' => $errors
        ]);
    }

    public function deleteAction(): bool|string
    {
        if (!User::isUserAuth())
            $this->redirect("/user/$this->language/login");

        $errors = [];
        $id_user = intval(User::getCurrentAuthUser()['id_user']);

        if (isset($_GET['id_good'])) {
            $id_good = intval($_GET['id_good']);
            $good = Good::getGoodById($id_good);

            if (Cart::isGoodInCart($id_user, $id_good)) {
                $cartGoods = Cart::getCartGoodsByUserID($id_user);

                if ($cartGoods !== null)
                    $goods = unserialize($cartGoods);
                else
                    $errors += Utils::generateMessage('somethingWrong', [
                        'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                        'eng' => 'Something went wrong! Try again!'
                    ]);

                if (!empty($goods)) {
                    $findGoods = array_filter($goods, function ($item) {
                        return $item['id_good'] != $_GET['id_good'];
                    });

                    $model = ['goods' => serialize($findGoods)];
                    $cartUpdateStatus = Cart::updateCartByUserID($id_user, $model);

                    if ($cartUpdateStatus) {
                        return $this->render("views/$this->theme/cart/$this->language/index.php", [
                            'goods' => $findGoods,
                            'errors' => $errors
                        ]);
                    } else {
                        $errors += Utils::generateMessage('somethingWrong', [
                            'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                            'eng' => 'Something went wrong! Try again!'
                        ]);
                    }
                }
            }
        }

        return $this->render("views/$this->theme/cart/$this->language/index.php", [
            'errors' => $errors
        ]);
    }
}