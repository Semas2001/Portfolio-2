<?php

    function add_to_cart($id){
        array_push($array, $id);
    }
    
    function display_item(){
        $mysqli = require __DIR__ . "\db.php";
        $sql = " SELECT * FROM items";
        $res =$mysqli->query($sql);

        $num = 1;

    

        $sql = " SELECT * FROM items WHERE `id` = $num";
        $result =$mysqli->query($sql);
       
        

        while($row = $res->fetch_assoc()){
            $sql = " SELECT * FROM items WHERE `id` = $num";
            $result =$mysqli->query($sql);
            $id = $row['id'];
            $item = $row["item"];
            $price = $row["price"];
            echo "<form action=post";
            echo "<div class='item_box'> ";
            echo "<div class='item'>$item </div>";
            echo "<br>";
            echo "<div class='price'>$price </div>";
            echo "<input class='button' type=submit></input>";
            echo "<br><br>";
            echo "</form>";
            echo "<br>";
            $num= $num+1;
        }

    }
    

?>