<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = md5(md5($_POST['motdepasse']));

    require_once 'dbconnect.php';

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("La connexion à la base de données a échoué : " . $conn->connect_error);
    }

    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO user (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Liaison des paramètres
        
        $stmt->bind_param("ssss", $nom, $prenom, $email, $motdepasse);

        // Exécution de la requête
        if ($stmt->execute()) {
            // Afficher un message de succès
    echo "Inscription réussie !";
    
    // Rediriger vers la page utilisateur après un délai de 3 secondes
    echo '<script>
        setTimeout(function() {
            window.location.href = "connexion.php";
        }, 1000);
    </script>';
        } else {
            echo "Erreur lors de l'inscription : " . $stmt->error;
        }

        // Fermeture du statement
        $stmt->close();
    } else {
        echo "Erreur de préparation de la requête : " . $conn->error;
    }

    // Fermeture de la connexion
    $conn->close();
}