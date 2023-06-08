<?php 
include("db.php");

if ($_SESSION['loggedin'] == true) {
    include("admin_nav.php");  
} else {
    include("nav.php");
}

$reviewsArr = loadTable($dbh, "reviews");
$count = count($reviewsArr);
$strArr = [];
$strNum = 0;

for ($i=0;$i<count($reviewsArr);$i++) {
    $str = "<h2><em>" . $reviewsArr[$i]->testimonial . "</em></h2><h4>-" . $reviewsArr[$i]->author . "</h4><br /></div>";
    array_push($strArr, $str);
}
echo "<h1>INVESTMENT HOUSE & CO</h1>";
echo "<h2><u>TESTIMONIALS</u></h2>";
echo "<form method='POST' action='home.php'>
<input type='submit' name='left' value='<-'></button>
<input type='submit' name='right' value='->'></button>
</form>";
if (isset($_POST['left'])) {
    $slide = slideHandler("left", $strArr, $strNum);
    echo $strArr[$slide];
    echo $slide;
} elseif (isset($_POST['right'])) {
    $slide = slideHandler("right", $strArr, $strNum);
    echo $strArr[$slide];
    echo $slide;
}
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
    <img src="company-logo.png"></img>
    
<h2><u>OUR PRODUCTS</u></h2>
<?php
$prodArr = loadTable($dbh, "products");
for ($i=0;$i<count($prodArr);$i++) {
    echo "<h2><em>" . $prodArr[$i]->type . "</em></h2><h4>$" . $prodArr[$i]->value . "</h4><br />";
}
function slideHandler($dir, $strArr, $currStr){
    $strNum = 0;
    if ($dir == "left" && $currStr > 0) {
        $strNum = $currStr -= 1;
    } elseif ($dir == "right") {
        $strNum = $currStr +=1;
    }
    return $strNum;
}
?>

</body>
</html>
