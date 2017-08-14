<?php
require '../config.php';
$db = Module::GetConnection();
session_start();
echo "Hello admine";
if(isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && (isset($_SESSION['user_status']) == 'admin')){

}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ADMIN</title>
    <link href="../resources/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Extra+Condensed|Roboto|Bevan" rel="stylesheet">
</head>
<body>
 <div id="wrapper">
     <?php include '../modules/admin_form/index.php'?>
 </div>
</body>
</html>