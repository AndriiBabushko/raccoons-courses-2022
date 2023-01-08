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
            if(!$videos)
                $model+= ['is_visible' => 1];
            $errors = [];

            if(!empty($model['theme'])) {
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
}