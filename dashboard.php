<?php session_start(); ?>

<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

</head>

<body>

    <h1>Login Successful!</h1>
    <a href="users.php">see users</a>
    <br>
    <a href="items_list.php">browse items</a>
    <br>
    <a href="add_an_item.php">add items</a>
    <br>
</body>

</html>

<?php mysqli_close($connection); ?>