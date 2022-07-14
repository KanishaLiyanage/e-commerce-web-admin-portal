<?php session_start(); ?>
<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<?php if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<?php

if (isset($_POST['submit'])) {

    $pbrand = mysqli_real_escape_string($connection, $_POST['product_brand']);
    $pname = mysqli_real_escape_string($connection, $_POST['product_name']);
    $price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $pdesc = mysqli_real_escape_string($connection, $_POST['product_description']);
    $pqty = mysqli_real_escape_string($connection, $_POST['product_qty']);
    $pimg = mysqli_real_escape_string($connection, $_POST['product_img']);
    $ppurchases = null;
    $pratings = null;

    $query = "INSERT INTO products(product_brand, product_name, price, product_description, qty, product_img, purchases, ratings) VALUES ('{$pbrand}', '{$pname}','{$price}','{$pdesc}','{$pqty}','{$pimg}','{$ppurchases}','{$pratings}')";

    $result = mysqli_query($connection, $query);

    if($result){
        echo "Item Added!";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>

<body>
    <center>

    <h1>Add Items</h1>

    <form action="add_items.php" method="POST">

        Product Brand: <input type="text" name="product_brand" maxlength="50" required>
        <br>
        Product Name: <input type="text" name="product_name" maxlength="50" required>
        <br>
        Product Price: <input type="text" name="product_price" required>
        <br>
        Product Description: <textarea name="product_description" rows="4" cols="50"></textarea>
        <br>
        Product Quantity: <input type="text" name="product_qty" required>
        <br>
        Product Image: <input type="file" name="product_img">
        <br>

        <input type="submit" name="submit" value="Add Product">

    </form>

    </center>

</body>

</html>

<?php mysqli_close($connection); ?>