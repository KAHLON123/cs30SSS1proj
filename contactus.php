<?php include("db.php");
if ($_SESSION['loggedin'] == true) {
    include("admin_nav.php");
} else {
    include("nav.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <form action="contactus.php" method="POST">
        <label>NAME:</label>
        <input type="text" name="name" required></input><br />
        <label>EMAIL:</label>
        <input type="text" name="email" required></input><br />
        <label>YOUR MESSAGE:</label>
        <input type="text" name="message" required></input><br />
        <input type="submit" name="submit" value="submit">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
    contactRequest($dbh, $_POST['name'], $_POST['email'], $_POST['message']);
    echo "Thank you for your message.";
    }
    ?>
</body>
</html>