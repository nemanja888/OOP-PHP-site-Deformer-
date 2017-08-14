<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/16/2017
 * Time: 1:44 PM
 */
if(isset($_GET['aid'])){
    $vest_id = $_GET['aid'];
    if( isset($user_name) && isset($user_email) && isset($user_id) && (isset($user_id) ? $user_id : 0 )){
        Comment::Render_comment_form($user_name,$user_email);
        Comment::InsertComment($db,$user_id,$vest_id);
        Comment::getAllComments($db,$vest_id,$user_id,$admin);
    }
}