<?php
/**
 * Created by PhpStorm.
 * User: nemanja
 * Date: 4/11/2017
 * Time: 8:24 PM
 */
if(isset($_GET['log'])){
    $log = $_GET['log'];
    if(is_numeric($log) && $log == 1){
        echo"<div id='log_in'>
    <form action='#' method='POST'>
        <div class='imgcontainer'>
            <img src='../resources/img/Login.jpg' alt='LogImg' class='avatar'>
        </div>

        <div class='container'>
            <input type='text' placeholder='Enter Username' name='uname' required><br>
            <input type='password' placeholder='Enter Password' name='password' required>

            <button type='submit' value='btn_submit' name='btn_submit'>Login</button>
            <input type='checkbox' checked='checked'> Remember me
        </div>

        <div class='container'>
            <button type='button' class='cancelbtn'>Cancel</button>
            <span class='psw'>Forgot <a href='#'>password?</a></span>
        </div>
    </form>
</div>";
    }
    elseif(is_numeric($log) && $log == 2){
        echo "<div class='sing_up'>
<h1>Sing Up</h1>
    <form method='post' action='#'>
        <label for='tb_name'>Name</label><br>
        <input type='text' name='tb_name' id='tb_name' placeholder='Enter Name'><br>
        <label for='tb_email'>Email</label><br>
        <input type='email' name='tb_email' id='tb_email' placeholder='Enter Email'><br>
        <label for='tb_pass'>Enter Password</label><br>
        <input type='password' name='tb_pass' id='tb_pass' placeholder='Enter password'><br>
        <label for='tb_rep_pass'>Repeat Password</label><br>
        <input type='password' name='tb_rep_pass' id='tb_rep_pass' placeholder='Repeat password'><br>
        <span>By creatig account you agree to our <a>Terms &amp; Privacy.</a></span><br>
        <input type='submit' name='btn_cancel' value='Cancel' id='btn_cancel'>
        <input type='submit' name='btn_sing_up' value='Sing Up'
               id='btn_sing_up'>
    </form>
</div>";
    }
    else{
        die("Error back to Home Page!");
    }
}
else{
    die("Error back to Home Page!");
}
?>

