<?php
$sql="SELECT * FROM items ORDER BY id ASC";
$result = $mysqli->query( $sql);
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_array($result)){
        echo "<form method='post' action='shoppingList.php?action=add&id=" . $row['id'] . "' >";
        echo "<div class='item_box'>";
        echo "<h1 class='item'>" . $row['item'] . "</h1> ";
        echo "<h2 class='price'>" . $row['price'] . "</h2> ";
        echo "<input type='text' name='quantity' value ='1'>";
        echo "<input type='hidden' name='hidden_name' value='".  $row['item']  ."'>";
        echo "<input type='hidden' name='hidden_price' value='".  $row['price']  ."'>";
        echo "<input type='submit' name='add' class='button' value='Add to Cart'>";
        echo "</div>";
        echo "</form>";
        
    }
}
?>

