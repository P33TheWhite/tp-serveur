<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
</head>
<body>
    <h3>Add Course</h3>
        <form name="addTeacher" id="addTeacher" action="registerCourse.php" method="POST">
            <fieldset>
                <legend>Course</legend>
                <label>Sport</label><input name="sport" id="sport" type="text"><br>
                <label>Summary</label><input name="summary" id="summary" type="text"><br>
                <label>Course date</label><input name="date" id="date" type="date"><br>
                <label>Adress</label><input name="adress" id="adress" type="text"><br>
                <label>Choose a teacher :</label>
                <select name="teacher" id="teacher">
                    <?php
                    $file=fopen("../Teacher/infoTeacher.csv", "r");
                    while (($data =fgetcsv($file)) !== false) {
                        echo "<option>$data[3]</option>";
                    }
                    fclose($file);
                    ?>
                </select><br>
            </fieldset>
            <input name="inscription" id="inscription" type="submit" value="confirm">
            <input name="reset" id="reset" type="reset" value="reset">
        </form>
</body>
</html>