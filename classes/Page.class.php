<?php

/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/8/2017
 * Time: 6:00 PM
 */
class Page
{

    public static function GetPage($id){
        $db = Module::GetConnection();
        $res = mysqli_query($db,"SELECT * FROM page WHERE id = {$id}");
        $new_page = mysqli_fetch_object($res, "Page");
        if($new_page){
            $new_page->modules_arr = explode(",",$new_page->modules);
        }
        return $new_page;
    }
}