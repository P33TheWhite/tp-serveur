<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
</head>
<body>
    <p>Bienvenue <?php echo $login; ?></p>
    <a href="../Teacher/addTeacher.php">Add new Teacher</a><br><br>
    <a href="../Sport/addSport.php">Add new Sport</a><br><br>
    <a href="login.php">Logout</a><br><br>
</body>
</html>
<?php
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}
?>
