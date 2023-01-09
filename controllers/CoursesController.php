<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use JetBrains\PhpStorm\NoReturn;
use models\Cart;
use models\Category;
use models\Comment;
use models\Error;
use models\Good;
use models\User;
use models\Video;

class CoursesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction(array $params): bool|string
    {
        if (!empty($params)) {
            $id_category = $params[0];
            $errors = [];

            if (is_numeric($id_category)) {
                $goods = Good::getGoodsByCategoryId(intval($id_category));
                $category = Category::getCategoryById(intval($id_category));

                if ($category) {
                    if ($goods) {
                        $goodsWithComments = [];
                        foreach ($goods as $good) {
                            $good['comments_count']= count(Comment::getCommentsByGoodId($good['id_good']));
                            $goodsWithComments[] = $good;
                        }
                        
                        return $this->render(null, [
                            'goods' => $goodsWithComments
                        ]);
                    } else {
                        $errors += Utils::generateMessage('noGoods', [
                            'ukr' => 'Товарів по даній категорії поки не існує! Поверніться пізніше <3',
                            'eng' => 'There are no products in this category yet! Come back later <3'
                        ]);
                    }
                } else {
                    $errors += Utils::generateMessage('notExist', [
                        'ukr' => 'Помилка! Категорія не існує!',
                        'eng' => 'Error! Category does not exist!'
                    ]);
                }
            } else {
                $errors += Utils::generateMessage('somethingWrong', [
                    'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                    'eng' => 'Something went wrong! Try again!'
                ]);
            }

            return $this->render(null, [
                'errors' => $errors
            ]);
        }

        $goods = Good::getGoods();
        $goodsWithComments = [];
        foreach ($goods as $good) {
            $good['comments_count']= count(Comment::getCommentsByGoodId($good['id_good']));
            $goodsWithComments[] = $good;
        }

        return $this->render(null, [
            'goods' => $goodsWithComments
        ]);
    }

    public function viewAction(array $params): Error|bool|string
    {
        if (!User::isUserAuth())
            $this->redirect("user/$this->language/login");

        $errors = [];
        $model = [];
        $currentUser = User::getCurrentAuthUser();

        if (!empty($params)) {
            $id_good = $params[0];
            $id_user = $currentUser['id_user'];

            if (Core::getInstance()->requestMethod === 'POST') {
                $model = $_POST + ['id_good' => $id_good, 'id_user' => $id_user];

                if (!Comment::isCommentExist($model['comment']))
                    $commentStatus = Comment::addComment($model);
                else
                    $errors += Utils::generateMessage('commentError', [
                        'ukr' => 'Помилка! Коментар вже існує :(',
                        'eng' => 'Error! Comment already exists :('
                    ]);
            }

            if (is_numeric($id_good)) {
                $good = Good::getGoodById($id_good);

                if ($good) {
                    $courseAccess = User::getGoodBoughtStatus($id_good, $currentUser['id_user']);
                    $courseMaker = User::getUserById(intval($good['id_user']));
                    $isCourseMaker = boolval($currentUser['id_user'] == $courseMaker['id_user']);

                    if ($courseAccess || $isCourseMaker) {
                        if (isset($_GET['id_video'])) {
                            $id_video = intval($_GET['id_video']);
                            Video::turnOfVisibleVideoByGoodId($id_good);
                            Video::updateVideoByVideoId($id_video, [
                                'is_visible' => 1
                            ]);
                            $currentVideo = Video::getVideoByVideoId($id_video);
                        } else
                            $currentVideo = Video::getVisibleVideoByGoodId($id_good);
                    } else
                        $currentVideo = Video::getVisibleVideoByGoodId($id_good);


                    $goodImgName = $good['photo'];
                    $videos = Video::getVideosByGoodId($id_good);
                    $comments = Comment::getCommentsByGoodId($id_good);
                    $usersAndComments = [];
                    if (!empty($comments))
                        foreach ($comments as $comment) {
                            $comment += User::getUserById($comment['id_user']);
                            $usersAndComments[] = $comment;
                        }

                    return $this->render(null, [
                        'idGood' => $id_good,
                        'isCourseMaker' => $isCourseMaker,
                        'goodImgName' => $goodImgName,
                        'videos' => $videos,
                        'currentVideo' => $currentVideo,
                        'comments' => $usersAndComments,
                        'courseMaker' => $courseMaker,
                        'currentUser' => $currentUser,
                        'courseAccess' => $courseAccess,
                        'model' => $model,
                        'errors' => $errors
                    ]);
                } else
                    $errors += Utils::generateMessage('notExist', [
                        'ukr' => 'Помилка! Товару не існує!',
                        'eng' => 'Error! Category does not exist!'
                    ]);
            } else
                return $this->error(404);
        }

        return $this->render(null, [
            'errors' => $errors
        ]);
    }

    public function deleteCommentAction(): bool|string
    {
        $id_good = null;

        if (isset($_GET['id_comment']) && isset($_GET['id_good'])) {
            $id_comment = $_GET['id_comment'];
            $id_good = $_GET['id_good'];
            $commentStatus = Comment::deleteCommentByCommentId($id_comment);

            if ($commentStatus)
                $this->redirect("/courses/$this->language/view/$id_good");
        }

        return $this->renderView('deleteCommentError', [
            'id_good' => $id_good
        ]);
    }

    public function addAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $categories = Category::getCategories();

        if (Core::getInstance()->requestMethod === 'POST') {
            $user = User::getCurrentAuthUser();
            $model = $_POST + ['id_user' => $user['id_user']];
            $errors = [];

            if (Good::verifyGoodByName($model['name'])) {
                if (empty($_FILES['photo']['name']) && empty($_FILES['photo']['tmp_name'])) {
                    $addGoodStatus = Good::addGood($model);
                } else {
                    if (Utils::checkImgExtension($_FILES['photo']['name'])) {
                        $addGoodStatus = Good::addGood($model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
                    } else {
                        $errors += Utils::generateMessage('photo', [
                            'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка фотографію.',
                            'eng' => 'File extension is wrong! Please download the photo.'
                        ]);
                    }
                }

                if (!empty($addGoodStatus) && $addGoodStatus)
                    $this->redirect("/courses/$this->language/index");
                else
                    $errors += Utils::generateMessage('somethingWrong', [
                        'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                        'eng' => 'Something went wrong! Try again!'
                    ]);
            } else
                $errors += Utils::generateMessage('name', [
                    'ukr' => 'Введена назва продукту(курсу) вже існує!',
                    'eng' => 'The entered good name already exists!'
                ]);

            return $this->render(null, [
                'model' => $model,
                'categories' => $categories,
                'errors' => $errors
            ]);
        }

        return $this->render(null, [
            'categories' => $categories
        ]);
    }

    public function updateAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $errors = [];
        $model = [];

        if(isset( $_GET['id_good'])) {
            $id_good = $_GET['id_good'];
            $categories = Category::getCategories();
            $good = Good::getGoodById(intval($id_good));

            if ($categories) {
                if (Core::getInstance()->requestMethod === 'POST') {
                    $model = $_POST;

                    if (empty($_FILES['photo']['name']) || Utils::checkImgExtension($_FILES['photo']['name'])) {
                        $updateGoodStatus = Good::updateGood($id_good, $model, $_FILES['photo']['tmp_name'], $_FILES['photo']['name']);
                        $good = Good::getGoodById(intval($id_good));

                        if ($updateGoodStatus) {
                            $id_user = intval(User::getCurrentAuthUser()['id_user']);
                            $cartGoods = Cart::getCartGoodsByUserID($id_user);
                            $userGoods = User::getBoughtGoodsByUserID($id_user);

                            if ($cartGoods !== null)
                                $cartGoods = unserialize($cartGoods);

                            if ($userGoods !== null)
                                $userGoods = unserialize($userGoods);

                            if (!empty($cartGoods)) {
                                $filterGoods = [];
                                foreach ($cartGoods as $cartGood) {
                                    if (intval($cartGood['id_good']) == intval($_GET['id_good'])) {
                                        $filterGoods[] = $good;
                                    } else
                                        $filterGoods[] = $cartGood;
                                }

                                $model = ['goods' => serialize($filterGoods)];
                                Cart::updateCartByUserID($id_user, $model);
                            }

                            if (!empty($userGoods)) {
                                $filterGoods = [];
                                foreach ($userGoods as $userGood) {
                                    if (intval($userGood['id_good']) == intval($_GET['id_good'])) {
                                        $filterGoods[] = $good;
                                    } else
                                        $filterGoods[] = $userGood;
                                }

                                $model = ['bought_goods' => serialize($filterGoods)];
                                User::updateUser($id_user, $model);
                            }

                            return $this->renderView('updateGoodStatus', [
                                'updateStatus' => true
                            ]);
                        }

                        return $this->renderView('updateGoodStatus', [
                            'updateStatus' => false
                        ]);
                    } else {
                        $errors += Utils::generateMessage('photo', [
                            'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка фотографію.',
                            'eng' => 'File extension is wrong! Please download the photo.'
                        ]);
                    }
                }

                return $this->render(null, [
                    'model' => $model,
                    'good' => $good,
                    'categories' => $categories,
                    'errors' => $errors
                ]);
            } else {
                $errors += Utils::generateMessage('somethingWrong', [
                    'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                    'eng' => 'Something went wrong! Try again!'
                ]);
            }
        } else {
            $errors += Utils::generateMessage('somethingWrong', [
                'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
                'eng' => 'Something went wrong! Try again!'
            ]);
        }


        return $this->render(null, [
            'errors' => $errors
        ]);
    }

    public function deleteAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        if (Core::getInstance()->requestMethod === 'POST') {
            $id_good = $_GET['id_good'];
            $deleteGoodStatus = Good::deleteGood($id_good);

            if ($deleteGoodStatus) {
                $id_user = intval(User::getCurrentAuthUser()['id_user']);
                $cartGoods = Cart::getCartGoodsByUserID($id_user);
                $userGoods = User::getBoughtGoodsByUserID($id_user);

                if ($cartGoods !== null)
                    $cartGoods = unserialize($cartGoods);

                if ($userGoods !== null)
                    $userGoods = unserialize($userGoods);


                if (!empty($cartGoods)) {
                    $filterGoods = array_filter($cartGoods, function ($item) {
                        return $item['id_good'] != $_GET['id_good'];
                    });

                    $model = ['goods' => serialize($filterGoods)];
                    Cart::updateCartByUserID($id_user, $model);
                }

                if (!empty($userGoods)) {
                    $filterGoods = array_filter($userGoods, function ($item) {
                        return $item['id_good'] != $_GET['id_good'];
                    });

                    $model = ['bought_goods' => serialize($filterGoods)];
                    User::updateUser($id_user, $model);
                }
                return $this->renderView('deleteGoodStatus', [
                    'deleteStatus' => true
                ]);
            }

            return $this->renderView('deleteGoodStatus', [
                'deleteStatus' => false
            ]);
        }

        return $this->render();
    }
}