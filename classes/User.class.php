<?php

/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/14/2017
 * Time: 12:57 PM
 */
class User
{
    private $user_id;
    private $user_name;
    private $user_email;
    public $user_comments;

    public function __construct($user_id, $user_name, $user_email)
    {
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_email = $user_email;
    }
    public function getUserName(){
        return $this->user_name;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function  getUserEmail(){
        return $this->user_email;
    }
}