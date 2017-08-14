<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/8/2017
 * Time: 2:23 PM
 */
if(!isset($_GET['cid']) && !isset($_GET['aid'])){
    $sve_vesti = Vest::getAll();
    foreach($sve_vesti as $vest){
        echo "<section class=\"section\">
                <h2><a href=\"index.php?aid={$vest->id}\">{$vest->naslov}</a></h2>
                 <p><img src=\"{$vest->link}\" alt=\"slika\">$vest->tekst</p>
        </section>";
    }
}
elseif (isset($_GET['cid']) && is_numeric($_GET['cid'])){
    $categorie_id = $_GET['cid'];
    $sve_vesti = Vest::getVestByCat($categorie_id);
    foreach($sve_vesti as $vest){
        echo "<section class=\"section\">
                <h2><a href=\"index.php?aid={$vest->id}\">{$vest->naslov}</a></h2>
                 <p><img src=\"{$vest->link}\" alt=\"slika\">$vest->tekst</p>
        </section>";
    }
}
elseif(isset($_GET['aid']) && is_numeric($_GET['aid'])){
    $vest_id = $_GET['aid'];
    $vest = Vest::getVestById($vest_id);
    echo "<section class=\"section1\">
                <h2>{$vest->naslov}</h2>
                <p><img src=\"{$vest->link}\" alt=\"slika\">{$vest->tekst}</p>
            </section>";
}
else{
    die('Error: back to home page');
}


/*
if($categorie == "all"){
    $rez = mysqli_query($db, "SELECT vesti.naslov, vesti.tekst, pictures.link FROM vesti JOIN pictures ON vesti.picture_id = pictures.id");
    $vest = array();
    while($row = mysqli_fetch_object($rez)){
        $vest[] = $row;
    }
    foreach ($vest as $val){
        ?>
        <section class="section">
            <h2><a href="index.php?aid=<?php echo $categorie . "&single=1"; ?>"><?php echo $val->naslov; ?></a></h2>
            <p><img src="<?php echo $val->link;?>" alt="slika"><?php echo $val->tekst; ?></p>
        </section>
        <?php
    }
}
else{
    $rez = mysqli_query($db, "SELECT vesti.naslov, vesti.tekst, vesti.categorie_id, pictures.link FROM vesti JOIN pictures ON vesti.picture_id = pictures.id WHERE  vesti.categorie_id = {$categorie}");
    $vest = array();
    while($row = mysqli_fetch_object($rez)){
        $vest[] = $row;
    }
    foreach ($vest as $val){
        ?>
        <section class="section">
            <h2><a href="#"><?php echo $val->naslov; ?></a></h2>
            <p><img src="<?php echo $val->link;?>" alt="slika"><?php echo $val->tekst; ?></p>
        </section>
        <?php
    }
}

*/
?>



