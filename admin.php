<?php include("db.php");
// if (!$_SESSION['loggedin']) {
//     header("location: product.php");
// }
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
    <?php
    $employeeArr = loadTable($dbh, "employees");
    ?>
    <a href="home.php">Homepage</a>
    <a href="contactus.php">Contact IH&C</a>
    <section>
    <form action='admin.php' method='POST'>
        <?php
        echo "<h1>IH&C Employee Database</h1>";
        for ($i=0;$i<count($employeeArr);$i++) {
            //make employee information into a form
            echo "<input name='firstName" . $i . "' type='text' value='" . $employeeArr[$i]->first_name . "'>
            <input name='ID' type='number' value='". $employeeArr[$i]->id ."'><br />
            <input name='lastName' type='text' value='" . $employeeArr[$i]->last_name . "'> 
            <input name='rank' type='text' value='" . $employeeArr[$i]->rank . "'> <br /> <br />";
        }
        echo "
        <input type='hidden' name='count' value='". count($employeeArr) ."'><input type='submit' name='submit' value='submit'>";
        ?>
    </form>
    
    </section>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        for ($i=0;$i<$_POST['count'];$i++) {
            $firstname = $_POST["firstName" . $i];
            echo $firstname;
        }
    }
    ?>
</body>
</html>