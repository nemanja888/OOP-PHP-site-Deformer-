<?php

/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/15/2017
 * Time: 1:12 PM
 */
class Factory
{
    public static function NoviKorisnik($tip){
        switch($tip){
            case"User":
                return new User();
                break;
            case"Admin":
                return new Admin();
        }
    }
}