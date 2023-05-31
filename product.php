<!-- redirrect here only when logged in as admin -->
<?php 
session_start();
if (!$_SESSION['loggedin']) {
    header("home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW PRODUCT</title>
</head>
<body>
    <form action="product.php" method="POST">
        <label><?php "PRODUCT NAME" ?></label>
    </form>
    
</body>
</html>
