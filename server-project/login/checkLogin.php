<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];

        //formulaire caché pour envoyer le login à home.php
        echo '<form id="login" action="home.php" method="post">';
        echo '<input type="hidden" name="login" value="' . $login . '">';
        echo '</form>';
        echo '<script>document.getElementById("login").submit();</script>';

        $file = fopen("../Teacher/infoTeacher.csv", "r");
        while (($data = fgetcsv($file)) !== FALSE) {
            if ($data[3] == $login && $data[4] == md5($password)) {
                fclose($file);
                $_SESSION['login'] = $login;
                header("Location: home.php");
                exit();
            }
        }

        fclose($file);

        if ($login == "admin" && $password == "admin") {
            $_SESSION['login'] = $login;
            header("Location: admin.php");
            exit();
        } else {
            $_SESSION["error"] = "Incorrect login or password";
            header("Location: login.php");
            exit();
        }
    }
}

?>
