<?php
session_start();
$mysqli = require __DIR__ . "/db.php";

$sql = "SELECT * FROM items";
$result = $mysqli -> query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION["id"] = $row["id"];
    $_SESSION["item"] = $row["item"];
    $_SESSION["price"] = $row["price"];
}

var_dump($_SESSION["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz Page</title>
    <link rel="stylesheet" href="styles.css" />
        <script
			  src="https://code.jquery.com/jquery-3.6.3.js"
			  integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
			  crossorigin="anonymous"></script>
    
    <script type = "text/javascript"></script>
</head>
<body>
    <div class='container' >
        <div class='box'>
           <!--  <?php include 'item_box.php'?>
            <?php display_item()?> -->
            <div class='button'><a href='cart.php'>View Cart</div></a>
        </div> 

    </div>


</body>



    
