<?php 
// include home and display testimonials, employees, and products as forms
include("db.php");
include("admin_nav.php");
// if (!$_SESSION['loggedin']) {
//     header("location: login.php");
// }
$employeeArr = loadTable($dbh, "employees");

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "SERVER REQUEST METHOD";
    switch ($_POST["s"]) {
        case "1":
            if (empty($hireFirstName) || empty($hireLastName) || empty($hirePosition)) {
                echo "None of these fields can be empty";
            } else {
                $hireFirstName = $_POST["addfirstName"];
                $hireLastName  = $_POST["addlastName"];
                $hirePosition = $_POST["addosition"];
                hire($hireFirstName, $hireLastName, $hirePosition);
                echo "Welcome to the team";
            }
            break;
        case "2":
            echo "CASE 2";
            for ($i=0;$i<$_POST['count'];$i++) {
                $firstname = $_POST["firstName" . $i];
                $lastname = $_POST["lastName" . $i];
                $position = $_POST["position" . $i];
                $id = $_POST["ID" . $i];
                employeeChange($dbh, $firstname, $lastname, $position, $id);
            }
            break;
        default:
            echo "<h3>Please choose an option</h3>";
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
    <section>
    <form action='admin.php' method='POST'>
        <?php
        // EMPLOYEES
        echo "<h1>IH&C Employee Database</h1>";
        for ($i=0;$i<count($employeeArr);$i++) {
            //make employee information into a form
            echo "<input name='firstName" . $i . "' type='text' value='" . $employeeArr[$i]->first_name . "'>
            <input name='ID" . $i . "' type='hidden' value='". $employeeArr[$i]->id ."'><br />
            <input name='lastName" . $i . "' type='text' value='" . $employeeArr[$i]->last_name . "'> 
            <input name='position" . $i . "' type='text' value='" . $employeeArr[$i]->position . "'> <br /> <br />";
        }
        echo "<input type='hidden' name='count' value='". count($employeeArr) ."'>";
        ?>
            <input name='addfirstName' type='text' value=''>
            <input name='addlastName' type='text' value=''> 
            <input name='addposition' type='text' value=''> <br /> <br />
            <select name="s">
                <option>OPTIONS</option>
                <option value="1">Hire</option>
                <option value="2">Update</option>
            </select>
            <input type="submit" name="submit" value="submit">
    </form>
    </section>
   
</body>
</html>