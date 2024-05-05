<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
        <form name="checkLogin" id="ceckLogin" action="checkLogin.php" method="POST">
            <fieldset>
                <legend>Connexion</legend>
                <label>Login</label><input name="login" id="login" type="text"><br>
                <label>Password</label><input name="password" id="password" type="password"><br>
            </fieldset>
            <input name="inscription" id="inscription" type="submit" value="confirm">
            <input name="reset" id="reset" type="reset" value="reset">
        </form>
        <br><a href="../menu.php">Go to Menu</a>
</body>
</html>