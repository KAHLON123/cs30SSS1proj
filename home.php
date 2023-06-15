<?php 
include("db.php");

$reviewsArr = loadTable($dbh, "reviews");
$count = count($reviewsArr);
$strArr = [];

for ($i=0;$i<count($reviewsArr);$i++) {
    $str = "<h2><em>" . $reviewsArr[$i]->testimonial . "</em></h2><h4>-" . $reviewsArr[$i]->author . "</h4><br /></div>";
    array_push($strArr, $str);
}

if (isset($_SESSION['slide'])) {
    $slide = $_SESSION['slide'];
} else {
    $slide = 1;
}

if (isset($_POST['left'])) {
    $slide = slideHandler("left", $strArr, $slide);
    $_SESSION['slide'] = $slide;
} elseif (isset($_POST['right'])) {
    $slide = slideHandler("right", $strArr, $slide);
    $_SESSION['slide'] = $slide;
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
    <!-- <img src="company-logo.png" width="50"></img> -->
    
<?php
 // define loggedin
if ($_SESSION['loggedin'] == true) {
    include("admin_nav.php");  
} else {
    include("nav.php");
}

echo "<h1>INVESTMENT HOUSE & CO</h1>";
echo "<h2><u>TESTIMONIALS</u></h2>";
echo "<form method='POST' action='home.php'>
<input type='submit' name='left' value='<-'></button>
<input type='submit' name='right' value='->'></button>
</form>";
echo $strArr[$slide];
?>

<h2><u>OUR PRODUCTS</u></h2>

<?php
$prodArr = loadTable($dbh, "products");
for ($i=0;$i<count($prodArr);$i++) {
    echo "<h2><em>" . $prodArr[$i]->type . "</em></h2><h4>$" . $prodArr[$i]->value . "</h4><br />";
}
function slideHandler($dir, $strArr, $slide){
    $strNum = 0;
    $count = count($strArr);
    if ($dir == "left" && $slide > 0) {
        $strNum = --$slide;
    } else if ($dir == "right" && $slide < $count - 1) {
        $strNum = ++$slide;
    }
    return $strNum;
}
?>

</body>
</html>
