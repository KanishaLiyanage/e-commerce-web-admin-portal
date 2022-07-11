<?php

session_start();
require_once('connections/dbconnetion.php');
require_once('components/header.php');

?>

<?php

if (!isset($_SESSION['id'])) {

    header('Location: login.php');
} else {

    if (isset($_GET['item_id'])) {

        echo "Item ID Passed!";
    } else {

        echo "Error!";
    }
}

?>

<?php

if (isset($_POST['update'])) {

    $id = mysqli_real_escape_string($connection, $_GET['item_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);

    $query = "UPDATE products SET product_name = '{$name}' WHERE product_id = '{$id}' LIMIT 1";

    $result = mysqli_query($connection, $query);

    if ($result) {
        header("location: items_list.php");
    }else{
        echo "Failed to add records!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="css/user_profile.css">
</head>

<body>

    <form action="edit_item.php" method="POST">
        Brand: <input type="text" name="brand">
        <br>
        Name: <input type="text" name="name">
        <br>
        Price: <input type="text" name="price">
        <br>
        Description: <input type="text" name="desc">
        <br>
        Quantity: <input type="text" name="qty">
        <br>
        Images: <input type="file" name="img">
        <br>
        <input type="submit" name="update" value="Update Product">
    </form>

</body>

</html>

<?php mysqli_close($connection); ?>

<!-- $query = "UPDATE customers SET password = \'123\' WHERE customers.customer_id = '{$_GET['user_id']}'";

$result = mysqli_query($connection, $query);

if ($result) {
    header('Location: user_profile.php?message=user_edited');
} else {
    header('Location: user_profile.php?error=user_edit_failed');
} -->