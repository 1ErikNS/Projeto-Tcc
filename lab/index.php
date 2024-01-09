<?php
session_start();
require 'config.php';

spl_autoload_register(function ($class){
    if(file_exists('controller/'.$class.'.php')) {
            require_once 'controller/'.$class.'.php';
    } elseif(file_exists('model/'.$class.'.php')) {
            require_once 'model/'.$class.'.php';
    } elseif(file_exists('core/'.$class.'.php')) {
            require_once 'core/'.$class.'.php';
    }
});

$core = new Core();
$core->run();
?>

