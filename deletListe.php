<?php
$servername = "localhost";
$username = "spcom1_komi";
$password = "SI8Z?Bihv8kg";
$dbname = "spcom1_komibd";

// Créez une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifiez la connexion
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Requête SQL pour supprimer la table
$sql = "DROP TABLE IF EXISTS candidatListe";

if ($conn->query($sql) === TRUE) {
    echo "La table 'candidatListe' a été supprimée avec succès.";
} else {
    echo "Erreur lors de la suppression de la table 'candidatListe': " . $conn->error;
}

// Fermez la connexion à la base de données
$conn->close();
?>
