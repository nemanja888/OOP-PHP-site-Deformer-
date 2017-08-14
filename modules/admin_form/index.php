<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/15/2017
 * Time: 4:00 PM
 */
?>
<h2>DODAJ NOVU VEST</h2>
<form action="#" method="post" id="ask" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <label for="categrie">Categorie</label>
            </td>
            <td><select name="categorie" >
                    <?php
                    $rez = mysqli_query($db,"SELECT categorie,id FROM categorie");
                    $categorie = array();
                    while($row = mysqli_fetch_object($rez)){
                        $categorie[] = $row;
                    }
                    foreach($categorie as $cat){
                        echo "<option value='{$cat->id}'>{$cat->categorie}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="title">Naslov</label>
            </td>
            <td>
                <input type="text" name="title" id="title" placeholder="Naslov teksta" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="tekst">Tekst: </label>
            </td>
            <td>
                <textarea name="tekst" id="tekst" placeholder="Vas  tekst..." required></textarea>
            </td>
        </tr>
        <tr>



            <td>
                <label for="autor">Autor</label>
            </td>
            <td>
                <select name="autor" id="autor" required>
                    <?php
                    $rez1 = mysqli_query($db,"SELECT id, autor_name, autor_surname FROM autor");
                    $autors = array();
                    while($row1 = mysqli_fetch_object($rez1)){
                        $autors[] = $row1;
                    }
                    foreach($autors as $autor){
                        echo "<option value='{$autor->id}'>{$autor->autor_name} {$autor->autor_surname}</option>";
                    }
                    ?>
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="pict">Slika</label>
            </td>
        </tr>
        <tr>
            <td>
                <input type="file" name="picture" id="pict">
            </td>
        </tr>
        <tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" name="submit" id="kli" value="Send">
            </td>
        </tr>

    </table>
</form>
<h2>IZBRISI VEST</h2>
<form action="#" method="POST" id="ask">
    <table>
        <tr>
            <td>
                <label for="vest">Izaberi vest:</label>
            </td>
            <td><select name="vest" id="vest">
            <?php
                $vesti = Vest::getAll();
                print_r($vesti);
                foreach($vesti as $vest){
                    echo "<option value=\"{$vest->id}\">{$vest->naslov}</option>";
                }
            ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" name="submit_del" id="kli" value="Remove">
            </td>
        </tr>
    </table>
</form>
<div id='log_out_button'><a href='../index.php'>Uredi komentare >>></a></div>
<?php
    if(isset($_POST['submit'])){
        if(isset($_POST['categorie']) &&
            isset($_POST['title']) &&
            isset($_POST['tekst']) &&
            isset($_POST['autor'])){

            $categorie = str_replace("'","",trim($_POST['categorie']));
            $categorie = str_replace("<","",$categorie);
            $categorie = str_replace(">","",$categorie);

            $title = str_replace("'","",trim($_POST['title']));
            $title = str_replace("<","",$title);
            $title = str_replace(">","",$title);

            $tekst = str_replace("'","",trim($_POST['tekst']));
            $tekst = str_replace("<","",$tekst);
            $tekst = str_replace(">","",$tekst);

            $autor = str_replace("'","",trim($_POST['autor']));
            $autor = str_replace("'","",$autor);
            $autor = str_replace("'","",$autor);

            if(empty($categorie) || empty($title) || empty($tekst) || empty($autor)){
                die ('Wrong input');
            }

            if($_FILES['picture']['size']<=0){
                die("Invalid file size");
            }
            elseif($_FILES['picture']['type'] != "image/jpeg" && $_FILES['picture']['type'] != "image/jpg" && $_FILES['picture']['type'] != "image/png"){
                die("invalid file format");
            }
            else{
                $picture_name = $_FILES['picture']['name'];
                $pic_link = "resources/img/".$picture_name;
                $pic_link_file = APP_DIR."resources/img/".$picture_name;
                move_uploaded_file($_FILES['picture']['tmp_name'], $pic_link_file);
            }


            Vest::InsertVest($title,$tekst,$autor,$categorie,$pic_link,$picture_name);
            echo "uspesno ste postavili vest sa naslovom \"" . $title . "\"";
        }
        else{
            echo "nesto nije setovano";
        }
    }
    if(isset($_POST['submit_del'])){
        if(isset($_POST['vest']) && is_numeric($_POST['vest'])){
            $vest_id = trim($_POST['vest']);
            Vest::DeleteVest($vest_id);
            echo "vest sa naslovom \"" . $vest->naslov . "\" je uspesno izbrisana";
        }
    }
?>
