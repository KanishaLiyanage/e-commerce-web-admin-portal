<?php session_start(); ?>
<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<?php if (!isset($_SESSION['id'])) {
    header("Location: login.php");
} else {
    if (isset($_GET['item_id'])) {
        echo "item ID Passed!";
    } else {
        echo "Error!";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item</title>
    <link rel="stylesheet" href="css/item.css">
</head> 

<body>

    <h1><?php echo "Product : " . $_GET['item_brand'] . " " . $_GET['item_name'] ?></h1>

    <?php

    $query = "SELECT * FROM products WHERE product_id = '{$_GET['item_id']}'";

    $result = mysqli_query($connection, $query);

    if ($result) { ?>

        <?php

        while ($record = mysqli_fetch_array($result)) { ?>

            <img class="itemImage" src="assets/uploads/<?=$record['product_img']?>">
            <form method="post">
                <input type="submit" name="editImage" value="Edit Image" class="button1 button2"/>
            </form>
            <p>Product ID: <?php echo $record['product_id'] ?></p>
            <p>Product Brand: <?php echo $record['product_brand'] ?></p>
            <p>Product Name: <?php echo $record['product_name'] ?></p>
            <p>Product Price: <?php echo $record['price'] ?></p>
            <p>Description: <?php echo $record['product_description'] ?></p>
            <p>Availability: <?php echo $record['qty'] ?></p>
            <p>Purchases: <?php echo $record['purchases'] ?></p>
            <p>Ratings: <?php echo $record['ratings'] ?></p>

            <?php if (isset($_POST['deleteButton'])) {
                header("Location: components/delete_item.php?item_id={$_GET['item_id']}");
            }

            if (isset($_POST['editButton'])) {
                header("Location: components/edit_item.php?item_id={$_GET['item_id']}");
            }

            if (isset($_POST['editImage'])) {
                header("Location: components/editItemImage.php?item_id={$_GET['item_id']}");
            }

            ?>

            <form method="post">
                <input type="submit" name="editButton" value="Edit Product" class="button1 button2" />
                <input type="submit" name="deleteButton" value="Delete Product" class="button button3"/>
            </form>

    <?php

        }
    }

    ?>

</body>

</html>

<?php mysqli_close($connection); ?>