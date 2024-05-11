<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["teacher"]) && isset($_POST["firstSport"]) && isset($_POST["secondSport"])) {
        $teacher = $_POST["teacher"];
        $firstSport = $_POST["firstSport"];
        $secondSport = $_POST["secondSport"];
        $file = fopen("infoSport.csv", "r+");
        $found = false;
        $newTab = [];
        while (($data = fgetcsv($file)) !== false) {
            if ($data[0] == $teacher) {
                $data[1] = $firstSport;
                $data[2] = $secondSport;
                $found = true;
            }
            $newTab[] = $data;
        }
        if (!$found) {
            $newTab[] = array($teacher, $firstSport, $secondSport);
        }
        rewind($file);
        ftruncate($file, 0);
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