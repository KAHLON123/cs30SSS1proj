<?php 
include("db.php");
include("nav.php");
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
<h2><u>TESTIMONIALS</u></h2>
<?php
$reviewsArr = loadTable($dbh, "reviews");
for ($i=0;$i<count($reviewsArr);$i++) {
    echo "<h2><em>" . $reviewsArr[$i]->testimonial . "</em></h2><h4>-" . $reviewsArr[$i]->author . "</h4><br />";
}

?>
<h2><u>OUR PRODUCTS</u></h2>
<?php
$prodArr = loadTable($dbh, "products");
for ($i=0;$i<count($prodArr);$i++) {
    echo "<h2><em>" . $prodArr[$i]->type . "</em></h2><h4>-" . $prodArr[$i]->value . "</h4><br />";
}
?>
</body>
</html>
