<?php 
session_start();
$_SESSION['loggedin'] = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <!-- <img src="company-logo.png"></img> -->
    <h1>INVESTMENT HOUSE & CO</h1>
    <?php include("nav.php") ?>
</body>
</html>