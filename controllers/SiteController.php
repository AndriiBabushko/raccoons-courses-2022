<?php

namespace controllers;

class SiteController
{
    public function indexAction()
    {
        echo "Main page";
    }

    public function errorAction($code){
        switch ($code){
            case 404: {
                echo 'Error 404. Page not found!';
                break;
            }
        }
    }
}