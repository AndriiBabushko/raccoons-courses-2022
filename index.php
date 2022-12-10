<?php
spl_autoload_register(function ($className) {
    $path = $className . ".php";
    include_once($path);
});

$core = core\Core::getInstance();
$core->initialize();
$core->run();
$core->done();
