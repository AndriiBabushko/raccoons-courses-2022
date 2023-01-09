<?php

namespace controllers;

use core\Controller;
use core\Core;
use core\Utils;
use models\Error;
use models\Good;
use models\User;
use models\Video;

class VideoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $goods = Good::getGoods();

        if (Core::getInstance()->requestMethod === 'POST') {
            $id_good = intval($_GET['id_good']);
            $videos = Video::getVideosByGoodId($id_good);
            $model = $_POST + ['id_good' => $id_good];
            if (!$videos)
                $model += ['is_visible' => 1];
            $errors = [];

            if (!empty($model['theme'])) {
                if (Utils::checkVideoExtension($_FILES['video']['name'])) {
                    $addVideoStatus = Video::addVideo($model, $_FILES['video']['tmp_name']);
                } else {
                    $errors += Utils::generateMessage('video', [
                        'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка відео формату mp4.',
                        'eng' => 'The file extension is incorrect! Please download the video in mp4 format.'
                    ]);
                }
            } else {
                $errors += Utils::generateMessage('theme', [
                    'ukr' => 'Тема не може бути пустою!',
                    'eng' => 'The theme cannot be empty!'
                ]);
            }

            if (!empty($addVideoStatus) && $addVideoStatus)
                $this->redirect("/courses/$this->language/view/$id_good");

            return $this->render(null, [
                'model' => $model,
                'goods' => $goods,
                'errors' => $errors
            ]);
        }

        return $this->render(null, [
            'goods' => $goods
        ]);
    }

    public function updateAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $errors = [];
        $model = [];

        if (isset($_GET['id_good']) && Good::getGoodById(intval($_GET['id_good']))) {
            $id_good = $_GET['id_good'];
            $selectedVideo = [];
            $videos = Video::getVideosByGoodId($id_good);

            if ($videos) {
                if (Core::getInstance()->requestMethod === 'POST') {
                    $model = $_POST + ['id_good' => $id_good];

                    if (isset($model['id_video']) && $model['id_video'] != 'NULL') {
                        $id_video = intval($model['id_video']);
                        setcookie('id_video', $id_video, time() + 3600);
                        $selectedVideo = Video::getVideoByVideoId($id_video);
                    } else {
                        if (!empty($model['theme'])) {
                            if (empty($_FILES['video']['name']) || Utils::checkVideoExtension($_FILES['video']['name'])) {
                                if (isset($_COOKIE['id_video'])) {
                                    $id_video = intval($_COOKIE['id_video']);
                                    $updateVideoStatus = Video::updateVideoByVideoId($id_video, $model, $_FILES['video']['tmp_name']);

                                    if ($updateVideoStatus) {
                                        return $this->renderView('updateVideoStatus', [
                                            'updateStatus' => true,
                                            'id_good' => $id_good
                                        ]);
                                    }
                                }

                                return $this->renderView('updateVideoStatus', [
                                    'updateStatus' => false,
                                    'id_good' => $id_good
                                ]);
                            } else {
                                $errors += Utils::generateMessage('video', [
                                    'ukr' => 'Розширення файлу неправильне! Завантажте будь-ласка відео формату mp4.',
                                    'eng' => 'The file extension is incorrect! Please download the video in mp4 format.'
                                ]);
                            }
                        } else {
                            $errors += Utils::generateMessage('theme', [
                                'ukr' => 'Тема не може бути пустою!',
                                'eng' => 'The theme cannot be empty!'
                            ]);
                        }
                    }
                }

                return $this->render(null, [
                    'model' => $model,
                    'selectedVideo' => $selectedVideo,
                    'videos' => $videos,
                    'errors' => $errors
                ]);
            }
        }

        $errors += Utils::generateMessage('somethingWrong', [
            'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
            'eng' => 'Something went wrong! Try again!'
        ]);

        return $this->render(null, [
            'errors' => $errors
        ]);
    }

    public function deleteAction(): Error|bool|string
    {
        if (!User::isAdmin())
            return $this->error(403);

        $errors = [];

        if (isset($_GET['id_good']) && Good::getGoodById(intval($_GET['id_good']))) {
            $id_good = $_GET['id_good'];
            $selectedVideo = [];
            $videos = Video::getVideosByGoodId($id_good);

            if ($videos) {
                if (Core::getInstance()->requestMethod === 'POST') {
                    $model = $_POST + ['id_good' => $id_good];

                    if (isset($model['id_video']) && $model['id_video'] != 'NULL') {
                        $id_video = intval($model['id_video']);
                        setcookie('id_video', $id_video, time() + 3600);
                        $selectedVideo = Video::getVideoByVideoId($id_video);
                    } else {
                        if (isset($_COOKIE['id_video'])) {
                            $id_video = intval($_COOKIE['id_video']);
                            $deleteVideoStatus = Video::deleteVideoByVideoId($id_video);

                            if($deleteVideoStatus) {
                                return $this->renderView('deleteVideoStatus', [
                                    'deleteStatus' => true,
                                    'id_good' => $id_good
                                ]);
                            }
                        }

                        return $this->renderView('deleteVideoStatus', [
                            'deleteStatus' => false,
                            'id_good' => $id_good
                        ]);
                    }
                }

                return $this->render(null, [
                    'id_good' => $id_good,
                    'selectedVideo' => $selectedVideo,
                    'videos' => $videos,
                    'errors' => $errors
                ]);
            }
        }

        $errors += Utils::generateMessage('somethingWrong', [
            'ukr' => 'Щось пішло не так! Спробуйте ще раз!',
            'eng' => 'Something went wrong! Try again!'
        ]);

        return $this->render(null, [
            'errors' => $errors
        ]);
    }
}