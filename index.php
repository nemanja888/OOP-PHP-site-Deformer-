<?php
    session_start();
    require 'config.php';
    if(isset($_SESSION['user_id']) && isset($_SESSION['user_name'])){
        $user_name = $_SESSION['user_name'];
        $user_id = $_SESSION['user_id'];
        $user_email = $_SESSION['user_email'];
        isset($_SESSION['user_status']) ?   $admin = $_SESSION['user_status'] : $admin = 0;
        $user = new User($user_id, $user_name, $user_email);
    }
    $db = Module::GetConnection();
    $page = Page::GetPage(isset($_GET['pid'])?$_GET['pid']:1);
    if(isset($_GET['us']) && $_GET['us'] == 1){
        echo "Uspeno ste se registrovali ulogujte se.";
    }

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php echo $page->page_name;?></title>
<link href="resources/style.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed|Roboto|Bevan" rel="stylesheet">
</head>

<body>
	<div id="wrapper">
		<header id="header">
			<?php
                include APP_DIR.'modules/header/index.php';
            ?>
		</header><!--kraj headera-->
		<nav id="nav">
			<?php
                include APP_DIR.'modules/mod_menu/index.php';
            ?>
		</nav>
		<div id="main">
            <?php
            foreach($page->modules_arr as $module){
                    include APP_DIR."modules/{$module}/index.php";
                }
            ?>

		</div><!--kraj maina-->
		
		<aside id="aside">
            <?php
                include APP_DIR.'modules/aside/index.php';
            ?>
		</aside>

        <?php
            include APP_DIR.'modules/mod_comment/index.php';
        ?>
        <footer id="footer">
                <?php include APP_DIR.'modules/footer/index.php'?>
		</footer><!--kraje footera-->
	</div><!--kraj wrapera-->
<script src="https://use.fontawesome.com/71eb608a05.js"></script>
</body>
</html>
