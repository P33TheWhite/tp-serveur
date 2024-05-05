<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add teacher</title>
</head>
<body>
    <h3>Add Teacher</h3>
        <form name="addTeacher" id="addTeacher" action="registerTeacher.php" method="POST">
            <fieldset>
                <legend>Personal information</legend>
                <label>Last Name</label><input name="nom" id="nom" type="text"><br>
                <label>First Name</label><input name="prenom" id="prenom" type="text"><br>
                <label>Hiring date</label><input name="date_embauche" id="date_embauche" type="date"><br>
            </fieldset>
            <input name="inscription" id="inscription" type="submit" value="confirm">
            <input name="reset" id="reset" type="reset" value="reset">
        </form>
</body>
</html>