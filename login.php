<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

require_once 'dbconnect.php';

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des données du formulaire
$email = $_POST['email'];
$motdepasse = md5(md5($_POST['motdepasse']));

// Requête pour vérifier l'existence de l'utilisateur
$query = "SELECT id FROM user WHERE email = '$email' AND motdepasse = '$motdepasse'";
$result = $conn->query($query);

if ($result->num_rows === 1) {
    // Utilisateur trouvé, création de la session
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['user_id'] = $row['id'];
    
    // Redirection vers la page message1.php
    header("Location: section2.php");
    exit();
} else {
    // Utilisateur non trouvé, affichage du message d'erreur
    echo "L'utilisateur n'existe pas. ".$email." :".$password ;
}

// Fermeture de la connexion à la base de données
$conn->close();
}
?>