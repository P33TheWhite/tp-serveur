<?php
function randomdp() {
    $length=rand(5,10);
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $lenChar=strlen($characters)-1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $lenChar)];
    }
    return $password;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["date_embauche"])) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $date_embauche = $_POST["date_embauche"];
        $pseudo = substr($prenom,0,1) . $nom;
        $file = fopen("infoTeacher.csv", "r");
        while(($data=fgetcsv($file)) !== FALSE){  
            if($data[3]==$pseudo){
                $pseudo .= rand(1, 99);
                break;
            }
        }
        $mdp = md5(randomdp());
        $file=fopen("infoTeacher.csv", "a");
        fputcsv($file, array($nom, $prenom, $date_embauche, $pseudo, $mdp));
        fclose($file);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Teacher</title>
</head>
<body>
    <a href="addTeacher.php">Add new teacher</a><br><br>
    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Hiring date</th>
            <th>Login</th>
        </tr>
            <?php
            // Ouvrir le fichier CSV en mode lecture
            $file = fopen("infoTeacher.csv", "r");
            while (($data=fgetcsv($file)) !== false) {
                echo "<tr>";
                foreach($data as $line) {
                    echo"<td>";
                    echo $line;
                    echo"</td>";
                }
            echo "</tr>";
            }
            fclose($file);
            ?>
        </ul>
    </table>
</body>
</html>