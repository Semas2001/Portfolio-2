<?php 
include 'header.php';
session_start();

$mysqli = require __DIR__ . "/db.php";

if (isset($_POST['add'])) {
    if (isset($_SESSION["shoppingList"])) {
        $array = array_column($_SESSION["shoppingList"], "id");
        if (!in_array($_GET["id"], $array)) {
            $count = count($_SESSION["shoppingList"]);
            $item_array = array(
                'id' => $_GET['id'],
                'item' => $_POST['hidden_name'],
                'price' => $_POST['hidden_price'],
                'quantity' => $_POST['quantity']
            );
            $_SESSION['shoppingList'][$count] = $item_array;
            echo '<script>window.location="shoppingList.php"</script>';
        } else {
            echo '<script>alert("Product is already in cart")</script>';
            echo '<script>window.location="shoppingList.php"</script>';
        }
    } else {
        $item_array = array(
            'id' => $_GET['id'],
            'item' => $_POST['hidden_name'],
            'price' => $_POST['hidden_price'],
            'quantity' => $_POST['quantity']
        );
        $_SESSION['shoppingList'][0] = $item_array;
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['shoppingList'] as $key => $value) {
            if ($value['id'] == $_GET['id']) {
                unset($_SESSION['shoppingList'][$key]);
                echo '<script>window.location="shoppingList.php"</script>';
            }
        }
    }
}
?>

<body>
    <div class='container'>
        <div class='box'>
            <?php include 'item_box.php'; ?>
            <h3 class='title'>Shopping Cart</h3>
            <div class='table-responsive'>
                <table class='table table-bordered'>
                    <tr>
                        <th width='30%'>Item</th>
                        <th width='10%'>Quantity</th>
                        <th width='13%'>Price</th>
                        <th width='10%'>Total</th>
                        <th width='17%'>Remove Item</th>
                    </tr>
                    <?php
                    if (!empty($_SESSION['shoppingList'])) {
                        $total = 0;
                        foreach ($_SESSION["shoppingList"] as $key => $value) {
                            echo "<tr>";
                            echo "<td>" . $value['item'] . "</td>";
                            echo "<td>" . $value['quantity'] . "</td>";
                            echo "<td>$" . $value['price'] . "</td>";
                            echo "<td>$" . number_format($value['quantity'] * $value['price'], 2) . "</td>";
                            echo "<td><a href='shoppingList.php?action=delete&id=" . $value['id'] . "'><span class='text-danger'>Remove</span></a></td>";
                            echo "</tr>";
                            $total = $total + ($value['quantity'] * $value['price']);
                        }
                        echo "<tr>";
                        echo "<td colspan='3' align='right'>Total</td>";
                        echo "<td align='right'>$" . number_format($total, 2) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>



    
