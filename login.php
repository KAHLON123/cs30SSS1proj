<!-- redirrect here only when logged in as admin -->
<?php
include("db.php");
include("nav.php");

if ($_SESSION['loggedin']) {
    header("location: admin.php");
}
if ($username == "user" && $password == "root") {
    $_SESSION['loggedin'] = true;
    header("location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="style.css" />
</head>
</html>
