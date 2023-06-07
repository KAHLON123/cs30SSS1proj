<!-- redirrect here only when logged in as admin -->
<?php
include("db.php");
include("nav.php");

if ($_SESSION['loggedin']) {
    header("location: home.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($_POST['username'] == "user" && $_POST['password'] == "root") {
        $_SESSION['loggedin'] = true;
        header("location: home.php");
    } else {
        echo "<h2><br />ACCESS DENIED<h2>";
    }
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
<body>
    <form action="login.php" method="POST">
        <input type="text" name="username">
        <input type="text" name="password">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
