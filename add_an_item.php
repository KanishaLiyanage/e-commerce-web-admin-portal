<?php session_start(); ?>

<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Items</title>
</head>

<body>
    <h1>Add Items</h1>
</body>

</html>

<?php mysqli_close($connection); ?>