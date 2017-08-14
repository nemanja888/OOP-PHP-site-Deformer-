<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 3/31/2017
 * Time: 7:27 PM
 */
class Module{
    const DBHOST = 'localhost';
    const DBUSER = 'root';
    const DBPASS = '';
    const DB = 'deformer_baza';
    public static $conn = null;

    public static function GetConnection(){
        if(!self::$conn){
            self::$conn = @mysqli_connect(self::DBHOST, self::DBUSER, self::DBPASS, self::DB);
        }
        return self::$conn;
    }
}