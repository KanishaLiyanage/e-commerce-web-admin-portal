<?php session_start(); ?>

<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<?php if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

    <center>

        <h1>Dashboard</h1>

        <div class="gridContainer">

            <a href="items_list.php">
                <div>
                    <p>browse items</p>
                    <img src="assets/icons/browse.png">
                </div>

            </a>
            <a href="add_items.php">
                <div>
                <p>add items</p>
                <img src="assets/icons/add.png">
                </div>
            </a>

            <a href="orders.php">
                <div>
                    <P>see orders</P>
                    <img src="assets/icons/orders.png">
                </div>
            </a>

            <a href="users.php">
                <div>
                    <p>see users</p>
                    <img src="assets/icons/users.png">
                </div>
            </a>

            <a href="shipments.php">
                <div>
                    <p>see shipments</p>
                    <img src="assets/icons/shipments.png">
                </div>
            </a>
            
            <a href="favorites.php">
                <div>
                    <p>see favorites</p>
                    <img src="assets/icons/favorites.png">
                </div>
            </a>

        </div>

    </center>

</body>

</html>

<?php mysqli_close($connection); ?>