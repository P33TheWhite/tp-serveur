<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        $file = fopen("../Teacher/infoTeacher.csv", "r");
        $found = false; //utilisateur valide trouvé
        
        while (($data = fgetcsv($file)) !== FALSE) {  
            if ($data[3] == $login && $data[4] == $password) {
                echo("A");
                header("Location: home.php");
                $found = true;
                exit();
            } else {
                if ($login == "admin" && $password == "admin") {
                    echo("B");
                    header("Location: home.php?admin=true");
                    $found = true;
                    exit();
                }
            }
        }
        
        fclose($file);
        
        if (!$found) {
            echo("C");
            $_SESSION["error"] = "Incorrect login or password"; 
            header("Location: login.php"); // Rediriger vers la page de connexion si erreur de login/password
            exit();
        }
    }
}
?>
