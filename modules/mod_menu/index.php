<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/16/2017
 * Time: 5:35 PM
 */
$rez = mysqli_query($db, "SELECT * FROM menu");
$menu = array();
while($row = mysqli_fetch_object($rez)){
    $menu[] = $row;
}
echo "<ul>";
foreach($menu as $item){
    echo "<li><a href=\"{$item->link}\">{$item->title}</a></li>";
}
echo "</ul>";
?>


