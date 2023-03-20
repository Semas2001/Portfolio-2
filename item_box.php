<?php
    
    function display_item(){
        $mysqli = require __DIR__ . "\db.php";
        $sql = " SELECT * FROM shoppinglist";
        $result =$mysqli-> query($sql);
        

        while($row = $result->fetch_assoc()){
            $title = "ITEM: ".$row['id'];
            $id =  $row['id'];
            echo "<div id='$id' class='item-box'>";
            echo"     <h1 id='Q$id'>$item,  $price</h1>";
            echo "</div>";
        }


    }
?>