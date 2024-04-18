<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["password"])) {
        $login = $_POST["login"];
        $password = $_POST["password"];
        // dans info prof
        $file = fopen("infoTeacher.csv", "r");
        while(($data=fgetcsv($file)) !== FALSE){  
            if($data[3]==$login && $data[4]=md5($password)){
                //go to home.php avec ajouter un cours
                break;
            }
        }
        if($login=="admin" && $password== "admin"){
            //rediriger vers home.php avec ajouter un prof et ajouter un sport
        }
        else{
            //erreur de login ou de mot de passe renvoyer vers la page login.php
            header("Location: login.php");
            exit();
        }
        fclose($file);
    }
}
