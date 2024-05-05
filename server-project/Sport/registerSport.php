<?php
// Vérifie si le formulaire a été soumis

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["teacher"]) && isset($_POST["firstSport"]) && isset($_POST["secondSport"])) {
        $teacher = $_POST["teacher"];
        $firstSport = $_POST["firstSport"];
        $secondSport = $_POST["secondSport"];
        //r+ = lecture + ecriture
        $file = fopen("infoSport.csv", "r+");
        $found = false;
        // Création tableau
        $newTab = [];
        // Lecture de chaque ligne du fichir
        while (($data = fgetcsv($file)) !== false) {
        // Si le professeur est trouvé, mettre à jour les sports            
            if ($data[0] == $teacher) {
                $data[1] = $firstSport;
                $data[2] = $secondSport;
                $found = true;
            }
            // Mise à jour newtab
            $newTab[] = $data;
        }
        // prof de sport pas dans la liste
        if (!$found) {
            $newTab[] = array($teacher, $firstSport, $secondSport);
        }
        // Retourner au début du fichier
        rewind($file);
        // Effacer le contenu du fichier
        ftruncate($file, 0);
        // Écriture csv
        foreach ($newTab as $line) {
            fputcsv($file, $line);
        }
        fclose($file);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Sport</title>
</head>
<body>
    <a href="addSport.php">Add new sport</a><br><br>
    <table>
        <tr>
            <th>Teacher</th>
            <th>First Sport</th>
            <th>Second Sport</th>
        </tr>
            <?php
            // Ouvrir le fichier CSV en mode lecture
            $file = fopen("infoSport.csv", "r");
            while (($data=fgetcsv($file)) !== false) {
                echo "<tr>";
                foreach ($data as $line) {
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