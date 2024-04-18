<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Course</title>
</head>
<body>
    <h3>Search Course</h3>
        <form name="searchResult" id="searchResult" action="searchResultCourse.php" method="POST">
            <fieldset>
                <legend>What Sport ?</legend>
                <label>Sport </label><input name="sport" id="sport" type="text"><br>
            </fieldset>
            <input name="inscription" id="inscription" type="submit" value="confirm">
            <input name="reset" id="reset" type="reset" value="reset">
        </form>
</body>
</html>