<?php

/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/9/2017
 * Time: 1:38 PM
 */
class Vest
{
    public $naslov;
    public $tekst;
    public $time;
    public $autor;
    public $categorie;
    public $link;

    public static function getVestById($id){
        $db = Module::GetConnection();
        mysqli_set_charset($db,"utf8");
        $res = mysqli_query($db,"SELECT vesti.id,vesti.naslov, vesti.tekst, vesti.vreme_objave, autor.autor_name, autor.autor_surname, categorie.categorie, pictures.link
 FROM vesti 
 JOIN autor ON vesti.autor_id = autor.id
 JOIN pictures ON vesti.picture_id = pictures.id 
 JOIN categorie ON vesti.categorie_id = categorie.id WHERE vesti.id = {$id}" );
        $vest = mysqli_fetch_object($res, get_called_class());
        return $vest;
    }

    public static function getVestByCat($id){
        $db = Module::GetConnection();
        mysqli_set_charset($db,"utf8");
        $res = mysqli_query($db,"SELECT vesti.id,vesti.naslov, vesti.tekst, vesti.vreme_objave, autor.autor_name, autor.autor_surname, categorie.categorie, pictures.link
 FROM vesti 
 JOIN autor ON vesti.autor_id = autor.id
 JOIN pictures ON vesti.picture_id = pictures.id 
 JOIN categorie ON vesti.categorie_id = categorie.id WHERE vesti.categorie_id = {$id}" );
        $vesti_po_kat = array();
        while($row = mysqli_fetch_object($res, get_called_class())){
            $vesti_po_kat[] = $row;
        }
        return $vesti_po_kat;
    }

    public static function getAll(){
        $db = Module::GetConnection();
        mysqli_set_charset($db,"utf8");
        $res = mysqli_query($db,"SELECT vesti.id,vesti.naslov, vesti.tekst, vesti.vreme_objave, autor.autor_name, autor.autor_surname, categorie.categorie, pictures.link
 FROM vesti 
 JOIN autor ON vesti.autor_id = autor.id
 JOIN pictures ON vesti.picture_id = pictures.id 
 JOIN categorie ON vesti.categorie_id = categorie.id" );
        $sve_vesti = array();
        while($row = mysqli_fetch_object($res, get_called_class())){
            $sve_vesti[] = $row;
        }
        return $sve_vesti;
    }

    public static function InsertVest($title,$text,$autor,$cat, $pic_link, $pic_name){
        $db = Module::GetConnection();
        mysqli_set_charset($db,"utf8");
        mysqli_query($db, "INSERT INTO deformer_baza.pictures (link, picture_name) VALUES ('{$pic_link}', '{$pic_name}')");
        mysqli_query($db, "INSERT INTO deformer_baza.vesti (naslov,tekst,autor_id,categorie_id,picture_id) VALUES ('{$title}','{$text}','{$autor}','{$cat}',LAST_INSERT_ID())");

    }


    public static function DeleteVest($vest_id){
        $db = Module::GetConnection();
        mysqli_query($db, "DELETE FROM vesti WHERE id = {$vest_id}");

    }
}
