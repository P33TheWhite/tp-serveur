<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
</head>
<body>
    <p>Bienvenue Admin</p>
    <a href="../Teacher/addTeacher.php">Add new Teacher</a><br><br>
    <a href="../Sport/addSport.php">Add new Sport</a><br><br>
    <a href="logout.php">Logout</a><br><br>
</body>
</html>
