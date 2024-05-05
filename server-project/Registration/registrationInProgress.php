<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration in progress</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["id"]) && isset($_POST["teacher"]) && isset($_POST["date"]) && isset($_POST["summary"]) && isset($_POST["address"]) && isset($_POST["sport"])) {
            $id = $_POST["id"];
            $teacher = $_POST["teacher"];
            $date = $_POST["date"];
            $summary = $_POST["summary"];
            $address = $_POST["address"];
            $sport = $_POST["sport"];

        ?>
        <h3>Registration in progress</h3>
        <p>You will register for the following course :</p>
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
            echo "<tr>";
            echo "<td>$id</td>";
            echo "<td>$teacher</td>";
            echo "<td>$date</td>";
            echo "<td>$summary</td>";
            echo "<td>$address</td>";
            echo "<td>$sport</td>";
            echo "</tr>";
            echo "</table>";

            ?>
            
        <!--Form + form caché-->
            <form name="finishedRegistration" id="finishedRegistration" action="finishedRegistration.php" method="POST">
                <fieldset>
                    <legend>Who ?</legend>
                    <label>Last Name</label><input name="nom" id="nom" type="text"><br>
                    <label>First Name</label><input name="prenom" id="prenom" type="text"><br>
                    <label>Phone</label><input name="phone" id="phone" type="text"><br>
                    <label>Age</label><input name="age" id="age" type="text"><br>
                     <!-- form caché-->
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="teacher" value="<?php echo $teacher; ?>">
                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <input type="hidden" name="summary" value="<?php echo $summary; ?>">
                    <input type="hidden" name="address" value="<?php echo $address; ?>">
                    <input type="hidden" name="sport" value="<?php echo $sport; ?>">
                </fieldset>
                <input name="inscription" id="inscription" type="submit" value="confirm">
                <input name="reset" id="reset" type="reset" value="reset">
            </form>
            <?php
        }
    }
        ?>
</body>
</html>
