<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/14/2017
 * Time: 9:42 PM
 */
require '../../config.php';
$db = Module::GetConnection();
if(isset($_GET['id']) && is_numeric($_GET['id']) && isset($_GET['aid']) && is_numeric($_GET['aid']) && isset($_GET['comid']) && is_numeric($_GET['comid'])){
    $user_id = $_GET['id'];
    $vest_id = $_GET['aid'];
    $comment_id = $_GET['comid'];
    Comment::deleteComment($db,$comment_id,$vest_id);
}