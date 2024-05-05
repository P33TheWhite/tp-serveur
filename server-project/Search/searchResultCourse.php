<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Teacher</title>
</head>
<body>
    <a href="searchCourse.php">Search new course</a><br><br>    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["sport"])) {
            $sport = $_POST["sport"];
            // Ouvrir le fichier CSV en mode lecture
            $file = fopen("../Course/infoCourse.csv", "r");
            $sportFound = false; // Variable pour indiquer si le sport a été trouvé
            $sportCSV = []; // Tableau pour stocker les lignes correspondant au sport
            while (($data = fgetcsv($file)) !== false) {
                if ($data[5] == $sport) {
                    $sportFound = true; // Le sport a été trouvé
                    $sportCSV[] = $data; // Stocker la ligne correspondant au sport dans le tableau
                }
            }     
            if($sportFound) {
    ?>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Teacher</th>
            <th>Date</th>
            <th>Summary</th>
            <th>Adress</th>
            <th>Sport</th>
            <th>Registration</th>
        </tr>
        <?php
            foreach ($sportCSV as $line) {
                echo "<tr>";
                foreach ($line as $val) {
                    echo "<td>";
                    echo $val;
                    echo "</td>";
                }
        ?>
    <!-- formulaire caché-->
            <td>
                <form action="../Registration/registrationInProgress.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $line[0]; ?>">
                    <input type="hidden" name="teacher" value="<?php echo $line[1]; ?>">
                    <input type="hidden" name="date" value="<?php echo $line[2]; ?>">
                    <input type="hidden" name="summary" value="<?php echo $line[3]; ?>">
                    <input type="hidden" name="address" value="<?php echo $line[4]; ?>">
                    <input type="hidden" name="sport" value="<?php echo $line[5]; ?>">
                    <button type="submit">Register</button>
                </form>
            </td>
        <?php
                echo "</tr>";
            }
            echo "</table>";
            fclose($file);
            }
            if (!$sportFound) {
                echo "Le sport n'est pas disponible";
            }
        }
    }
    ?>
</body>
</html>
