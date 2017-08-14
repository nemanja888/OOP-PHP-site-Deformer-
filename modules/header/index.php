<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/8/2017
 * Time: 2:17 PM
 */
$res = mysqli_query($db, "SELECT * FROM socials");
$social_arr = array();
while($row = mysqli_fetch_assoc($res)){
    $social_arr[] = $row;
}
?>
<div id="logo">
    <h1><a href="index.php">DEFORMER</a></h1>
    <p>Po vasem ukusu</p>
    <?php
    if(isset($user)){
        echo  "<p>Dobro dosli {$user->getUserName()}</p>";
    }?>
</div>
<?php
    if(!($_SESSION)){
        echo "<div id='log_buttons'>
    <a href='admin/login.php?log=2'>Sing Up</a>
    <a href='admin/login.php?log=1'>Log In</a>
    </div>";
    }
    else {
        echo "<div id='log_out_button'><a href='modules/log_out/log_out.php?log=3'>Log out</a></div>";
    }
?>


<div id="socials">
    <?php
        foreach($social_arr as $social){
            echo $social['content'];
        }
    ?>
</div>
<div id="cover">

</div>
