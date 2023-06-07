<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Welcome,
        <?php echo $_SESSION['username']; ?>!
    </h1>
    <p>This is your dashboard page.</p>
    <p><a href="index.php">Sign Out</a></p>
</body>

</html>