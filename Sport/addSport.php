<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sport</title>
</head>
<body>
    <h3>Add Sport</h3>
        <form name="addTeacher" id="addTeacher" action="registerSport.php" method="POST">
            <fieldset>
                <legend>Sport</legend>
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
                <label>First Sport</label><input name="firstSport" id="firstSport" type="text"><br>
                <label>Second Sport</label><input name="secondSport" id="secondSport" type="text"><br>
            </fieldset>
            <input name="inscription" id="inscription" type="submit" value="confirm">
            <input name="reset" id="reset" type="reset" value="reset">
        </form>
</body>
</html>