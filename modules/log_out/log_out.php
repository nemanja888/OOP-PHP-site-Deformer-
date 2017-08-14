<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/14/2017
 * Time: 3:14 PM
 */
session_start();
if(isset($_GET['log']) && $_GET['log'] == 3){
    session_destroy();
    header('Location: ../../index.php');
}
