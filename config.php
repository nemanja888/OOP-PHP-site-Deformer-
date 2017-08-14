<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/8/2017
 * Time: 5:50 PM
 */
define('APP_DIR','c:/wamp64/www/primeri/mojblog/');

function __autoload($classname){
    require_once(APP_DIR ."classes/{$classname}.class.php");
}