<article class="article">
    <form action="#" method="post" >
        <label for="search">Search for:</label><br>
        <input type="text" name="search" class="search">
        <input type="submit" value="Search">

    </form>

</article>

<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/8/2017
 * Time: 5:31 PM
 */
$rez = mysqli_query($db,"SELECT categorie,link FROM categorie");
$categorie = array();
while($row = mysqli_fetch_object($rez)){
    $categorie[] = $row;
}
echo "<article class='article'><h2>Categories</h2><ul>";
foreach($categorie as $cat){
    echo "<li><a href='{$cat->link}'>{$cat->categorie}</a></li>";
}
echo "</ul></article>";

$rez1 = mysqli_query($db,"SELECT autor_name, autor_surname, email, link FROM autor");
$autors = array();
while($row1 = mysqli_fetch_object($rez1)){
    $autors[] = $row1;
}
echo "</article><article class='article'><h2>Autors</h2><ul>";
foreach($autors as $autor){
    echo "<li><a href='#'>{$autor->autor_name} {$autor->autor_surname}</a></li>";
}
echo "</ul></article>";
?>

<!--
<article class="article">
    <h2>Autors</h2>
    <ul>
        <li><a href="#">Dragan Kolubrc</a></li>
        <li><a href="#">Mirko Brkoprst</a></li>

    </ul>

</article>
<article class="article">
    <h2>Categories</h2>
    <ul>
        <li><a href="index.php?cid=1">Vesti</a></li>
        <li><a href="index.php?cid=2">Sport</a></li>
        <li><a href="index.php?cid=3">Kultura</a></li>
        <li><a href="index.php?cid=4">Razonoda</a></li>
        <li><a href="index.php?cid=5">Links</a></li>
    </ul>

</article>
-->

