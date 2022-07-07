<?php session_start(); ?>
<?php require_once('connections/dbconnetion.php'); ?>
<?php require_once('components/header.php'); ?>

<?php

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
} else {
}

$user_list = "";
$query = "SELECT customer_id, username,email,last_login FROM customers WHERE is_deleted = 0 ORDER BY customer_id";
$users = mysqli_query($connection, $query);

if ($users) {
    while ($user = mysqli_fetch_assoc(($users))) {
        $user_list .= "<tr>";
        $user_list .= "<td> {$user['customer_id']} </td>";
        $user_list .= "<td> {$user['username']} </td>";
        $user_list .= "<td> {$user['email']} </td>";
        $user_list .= "<td> {$user['last_login']} </td>";
        $user_list .= "<td> <a href=\"user_profile.php?user_id={$user['customer_id']}\"> Go to profile </a> </td>";
        $user_list .= "<td> <a href=\"delete_user.php?user_id={$user['customer_id']}\"> Delete </a> </td>";
        $user_list .= "</tr>";
    }
} else {
    echo "Datbase failed!";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Users List</h1>
        <table class="usersTable">
            <tr>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Last Login</th>
                <th>Profile</th>
                <th>Remove</th>
            </tr>
            <?php echo $user_list; ?>
        </table>
    </main>
</body>

</html>

<?php mysqli_close($connection); ?>