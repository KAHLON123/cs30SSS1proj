<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
    <form action="contactus.php" method="POST">
        <label>NAME:</label>
        <input type="text" name="name" required><br />
        <label>EMAIL:</label>
        <input type="text" name="email" required><br />
        <label>YOUR MESSAGE:</label>
        <input type="text" name="message" required><br />
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    include("db.php");
    include("nav.php");
    ?>
</body>
</html>