<?php

use core\DB;

include 'config/database.php';

spl_autoload_register(function ($className) {
    $path = $className . ".php";
    if(file_exists($path))
        include_once($path);
});

$core = core\Core::getInstance();
$core->initialize();
$core->run();
$core->done();
