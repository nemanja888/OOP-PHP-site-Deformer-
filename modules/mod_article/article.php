<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/9/2017
 * Time: 9:38 AM
 */

$sve_vesti = Vest::getAll();

foreach($sve_vesti as $vest){
    echo "<section class=\"section\">
                <h2><a href=\"index.php?aid=\">{$vest->naslov}</a></h2>
                 <p><img src=\"{$vest->link}\" alt=\"slika\">$vest->tekst</p>
        </section>";
}


?>

