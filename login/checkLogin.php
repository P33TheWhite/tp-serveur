<?php
session_start();

// Vérifie si l'utilisateur est déjà connecté
if (isset($_SESSION['login'])) {
    // Redirige vers la page d'accueil appropriée en fonction du rôle de l'utilisateur
    if ($_SESSION['login'] == "admin") {
        header("Location: admin.php");
    } else {
        header("Location: home.php");
    }
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        if ($login == "admin" && $password == "admin") {
            $_SESSION['login'] = $login;
            header("Location: admin.php");
            exit();
        }
        elseif ($file = fopen("../Teacher/infoTeacher.csv", "r")) {
            while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
                if ($data[3] === $login && $data[4] === md5($password)) {
                    $_SESSION['login'] = $login;
                    header("Location: home.php");
                    exit();
                }
            }
            fclose($file);
        } else {
            header("Location: login.php");
            exit();
        }
    }
}