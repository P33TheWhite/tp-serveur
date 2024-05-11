<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>End of registration</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["id"]) && isset($_POST["teacher"]) && isset($_POST["date"]) && isset($_POST["summary"]) && isset($_POST["address"]) && isset($_POST["sport"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["phone"]) && isset($_POST["age"])) {
            $id = $_POST["id"];
            $teacher = $_POST["teacher"];
            $date = $_POST["date"];
            $summary = $_POST["summary"];
            $address = $_POST["address"];
            $sport = $_POST["sport"];

            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $phone = $_POST["phone"];
            $age = $_POST["age"];
            ?>
            <h3>End of registration</h3>
            <p>You are registered for the following course:</p>
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
            echo"<tr>";
            echo "<td>$id</td>";
            echo "<td>$teacher</td>";
            echo "<td>$date</td>";
            echo "<td>$summary</td>";
            echo "<td>$address</td>";
            echo "<td>$sport</td>";
            echo "</tr>";
            echo "</table>";

            $csvFile = fopen("ABC1456-cours.csv", "a");
            fputcsv($csvFile, array($nom, $prenom, $phone, $age));
            fclose($csvFile);
            echo "<p>Registration information saved successfully.</p>";
        }
    }
    ?>
</body>
</html>
