<?php

function randomdp() {
    $length=5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    $lenChar=strlen($characters)-1;
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $lenChar)];
    }
    return $password;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["sport"]) && isset($_POST["summary"]) && isset($_POST["date"]) && isset($_POST["adress"]) && isset($_POST["teacher"])) {
        $sport = $_POST["sport"];
        $summary = $_POST["summary"];
        $date = $_POST["date"];
        $adress = $_POST["adress"];
        $teacher = $_POST["teacher"];
        $id = randomdp();
        $file=fopen("infoCourse.csv", "a");
        fputcsv($file, array($id, $teacher, $date, $summary, $adress, $sport));
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
    <a href="addCourse.php">Add new course</a><br><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Teacher</th>
            <th>Date</th>
            <th>Summary</th>
            <th>Adress</th>
            <th>Sport</th>
        </tr>
            <?php
            // Ouvrir le fichier CSV en mode lecture
            $file = fopen("infoCourse.csv", "r");
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