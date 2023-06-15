<?php 
include("db.php");
include("admin_nav.php");
if (!$_SESSION['loggedin']) {
    header("location: login.php");
}

$productArr = loadTable($dbh, "products");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['s']) {
        case "1":

            break;
        case "2":
            productRequest();
            break;
    }
}
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
    <h1>IH&C PRODUCT DATABASE</h1>
    <form>
        <?php
        for ($i = 0; $i < count($productArr); $i++) { // put object titles in place
            echo "<input type='text' name='prodType" . $i . "' value='" . $productArr($i)->type . "'><br /><input type='text' name='prodValue" . $i . "' value='" . $productArr($i)->value . "'>";
        }
        echo "<input type='hidden' name='count' value='". count($employeeArr) ."'>";
        ?>
            <input name='addprodtype' type='text' value=''>
            <input name='addlastName' type='text' value=''> 
            <input name='addposition' type='text' value=''> <br /> <br />
            <select name="s">
                <option>OPTIONS</option>
                <option value="1">Add Product</option>
                <option value="2">Update</option>
            </select>
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>