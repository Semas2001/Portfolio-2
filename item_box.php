<?php
    
    function display_item(){
        $mysqli = require __DIR__ . "\db.php";
        $sql = " SELECT * FROM items";
        $result =$mysqli->query($sql);

        $items = $result->fetch_assoc();

        $num = 0;

       /*  $id = $items["id"]; */
        $item = $items["item"];
        $price = $items["price"];
        $row = $result->mysql_fetch_row();
        

        while($row = $result->fetch_assoc()){
            /* $title = "ITEM: ".$row['id'];
            $id =  $row['id'];
            echo "<div id='$id' class='item-box'>";
            echo" <h1 id='Q$id'>$id: $item,  $price</h1>";
            echo "</div>"; */
            ECHO $rew[$num];
            $num= $num+1;
        }


    }
?>