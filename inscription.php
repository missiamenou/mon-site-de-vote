<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="inscription.css"/>
</head>
<body>
    <form class ="form_container" action="register.php" method="POST">
        <p class = "form_container_heading">Inscription</p>
        <!-- <label for="nom">Nom :</label> -->
        <input class = "form_container_inputs" type="text" id="nom" placeholder="nom" name="nom" required><br><br>

        <!-- <label for="prenom">Prénom :</label> -->
        <input class = "form_container_inputs" type="text" id="prenom" placeholder="prenom" name="prenom" required><br><br>

        <!-- <label for="email">Adresse e-mail :</label> -->
        <input class = "form_container_inputs" type="email" id="email" placeholder="email@gmail.com" name="email" required><br><br>

        <!-- <label for="motdepasse">Mot de passe :</label> -->
        <input class = "form_container_inputs" type="password" id="motdepasse" placeholder="password" name="motdepasse" required><br><br>

        <!-- <label for="confirmermotdepasse">Confirmer le mot de passe :</label> -->
        <input class = "form_container_inputs" type="password" id="confirmermotdepasse" placeholder="confirme password" name="confirmermotdepasse" required><br><br>
        <button class = "form_container_button" >S'inscrire</button>
        <!-- <input type="submit" value="S'inscrire"> -->
    </form>
</body>
</html>

