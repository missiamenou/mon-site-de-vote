<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link rel="stylesheet" href="connexion.css"/>
</head>
    <main>
    <body>
        <form class ="form_container" action="login.php" method="post">
            <P class = "form_container_heading">connexion</P>
            <!-- <label for="email">Adresse e-mail :</label> -->
            <input class = "form_container_inputs" placeholder="emai@gmail.com" type="email" id="email" name="email" required><br><br>

            <!-- <label for="motdepasse">Mot de passe :</label> -->
            <input class = "form_container_inputs" type="password" placeholder="password" id="motdepasse" name="motdepasse" required><br><br>
            <button class = "form_container_button" >Se connecter</button>
            <!-- <input class = "form_container_inputs" type="submit" value="S'inscrire"> -->
            <p>avez-vous un compte?<strong><a href="inscription.php">Inscription</a></strong></p>
        </form>
</body>
    </main>
</html>