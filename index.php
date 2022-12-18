<?php

use core\DB;

include 'config/database.php';

spl_autoload_register(function ($className) {
    $path = $className . ".php";
    include_once($path);
});

//$res = $db->insert('User', [
//    'first_name' => 'Andrii',
//    'last_name' => 'Babushko',
//    'email' => 'andriibabushko@gmail.com',
//    'phone_number' => '+380638179858',
//    'bio' => 'My name is Andrii. I am Junior Web Developer.',
//    'password' => 'Andrey1229576',
//    'is_admin' => 0]);
//var_dump($res);

$core = core\Core::getInstance();
$core->initialize();
$core->run();
$core->done();
