<?php
require '../config.php';

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title></title>
    <link href="../resources/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed|Roboto|Bevan" rel="stylesheet">
</head>

<body>
<div id="">
    <?php
        include APP_DIR.'modules/log_in/log_in.php';
    ?>
</div>
<!--kraj wrapera-->
<?php
if(isset($_POST['btn_sing_up'])){
    if(isset($_POST['tb_name']) && isset($_POST['tb_email']) && isset($_POST['tb_pass']) && isset($_POST['tb_rep_pass'])){
        $name = str_replace("'","",trim($_POST['tb_name']));
        $name = str_replace("<","",$name);
        $name = str_replace(">","",$name);

        $email = str_replace("'","",trim($_POST['tb_email']));
        $email = str_replace("<","",$email);
        $email = str_replace(">","",$email);

        $password = str_replace("'","",trim($_POST['tb_pass']));
        $password = str_replace("<","",$password);
        $password = str_replace(">","",$password);

        $rep_pass = str_replace("'","",trim($_POST['tb_rep_pass']));
        $rep_pass = str_replace("<","",$rep_pass);
        $rep_pass = str_replace(">","",$rep_pass);

        if(empty($name) || empty($password) || empty($rep_pass)){
            die("<br><p>Invalid data!</p>>");
        }
        if($password === $rep_pass){
            $password = md5($password);
            $db = Module::GetConnection();
            if(!$db){
                die ("<br><p>database connection error</p>");
            }
            $prip = mysqli_stmt_init($db);
            mysqli_stmt_prepare($prip,"INSERT INTO korisnici VALUES (null,?,?,?,null,null)");
            mysqli_stmt_bind_param($prip,"sss",$name,$email,$password);
            mysqli_stmt_execute($prip);
            mysqli_stmt_close($prip);
            header('Location: ../index.php?us=1');
        }
        else{
            echo "<br><br><br><p>Password don't match</p>";
        }

    }
}
elseif(isset($_POST['btn_submit'])){
    if(isset($_POST['uname']) && isset($_POST['password'])){
            $name = str_replace("'","",trim($_POST['uname']));
            $name = str_replace(">","",$name);
            $name = str_replace("<","",$name);

            $password = str_replace("'","",trim($_POST['password']));
            $password = str_replace("<","",$_POST['password']);
            $password = str_replace(">","",$_POST['password']);

            $password = md5($password);

            if(empty($name) || empty($password)){
                die('Wrong input');
            }

            $db = Module::GetConnection();
            $prip = mysqli_stmt_init($db);
            mysqli_stmt_prepare($prip, "SELECT id, name, email, admin FROM korisnici WHERE name = ? AND password = ?");
            mysqli_stmt_bind_param($prip,"ss",$name,$password);
            mysqli_stmt_execute($prip);
            mysqli_stmt_bind_result($prip, $user_id, $user_name, $user_email, $user_status);
            if(mysqli_stmt_fetch($prip)){
                session_start();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                if($user_status == 'admin'){
                    $_SESSION['user_status'] = $user_status;
                    header("Location: admin.php");
                }
                else{
                    header("Location: ../index.php");
                }

            }
            else{
                die('invalid user');
            }


    }
}




?>


</body>
</html>
