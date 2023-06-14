<?php 
include("db.php");
include("admin_nav.php");
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}

$productArr = loadTable($dbh, "products");

echo "<h1>IH&C PRODUCT DATABASE</h1>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RESTRICTED ACCESS</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form>
        <?php
        for ($i = 0; $i < count($productArr); $i++) { // put object titles in place
            echo "<input type='text' name='prodName" . $i . "' value='" . $productArr($i)-> obj . "'>";
        }
        ?>
    </form>
</body>
</html>