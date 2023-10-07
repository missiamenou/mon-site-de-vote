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

// Les données à insérer
$dataToInsert = [
    [1, 'DIVINE BLE', 'asset/photo_nomine/producteur_contenu/divine.jpg', 'producteur_contenu', 0],
    [2, 'GODWIN SOOLA', 'asset/photo_nomine/producteur_contenu/godwin.JPG', 'producteur_contenu', 0],
    [3, 'CAMILLE ETE', 'asset/photo_nomine/producteur_contenu/camille.JPG', 'producteur_contenu', 1],
    [4, 'AUDREY BAMBA', 'asset/photo_nomine/producteur_contenu/audrey.jpg', 'producteur_contenu', 0],
    [5, 'MARIE ELLA KOUAKOU', 'asset/photo_nomine/contenu_rh/marie.jpg', 'contenu_rh', 0],
    [0, 'AUDE ANNICETTE KOKO', 'asset/photo_nomine/contenu_rh/anicette.JPG', 'contenu_rh', 1],
    [7, 'MANON ARIELLE DEBLEZA', 'asset/photo_nomine/contenu_rh/arielle.jpg', 'contenu_rh', 0],
    [8, 'RACHIDAT BROUAHIMA', 'asset/photo_nomine/contenu_rh/rachidat.jpg', 'contenu_rh', 0],
    [9, 'BINNIE BINTOU CISSE', 'asset/photo_nomine/coach_expert/binnie.jpg', 'coach_expert', 0],
    [10, 'VINCENT KADIO', 'asset/photo_nomine/coach_expert/kadio.jpg', 'coach_expert', 0],
    [11, 'YANNICK BOKA', 'asset/photo_nomine/coach_expert/boka.jpg', 'coach_expert', 0],
    [12, 'FREDERICK WILLIAMS KINGUE', 'asset/photo_nomine/coach_expert/kingue.jpg', 'coach_expert', 0],
    [13, 'GRACE ADJE', 'asset/photo_nomine/contributeur_linkedin/grace.JPG', 'contributeur_linkedin', 0],
    [14, 'RAISSA KOUADIO', 'asset/photo_nomine/contributeur_linkedin/raissa.jpg', 'contributeur_linkedin', 0],
    [15, 'YASMINE SIBAHI', 'asset/photo_nomine/contributeur_linkedin/yasmine.jpg', 'contributeur_linkedin', 0],
    [17, 'JOSEPH NDRI', 'asset/photo_nomine/coach_expert/joseph.jpg', 'contributeur_linkedin', 0]
];

// Préparez la requête SQL d'insertion
$sql = "INSERT INTO candidat (id, nom_prenom, photo, nomine, points) VALUES (?, ?, ?, ?, ?)";

// Préparez la déclaration pour l'exécution répétée
$stmt = $conn->prepare($sql);

if ($stmt) {
    // Liez les paramètres
    $stmt->bind_param("isssi", $id, $nom_prenom, $photo, $nomine, $points);

    foreach ($dataToInsert as $data) {
        list($id, $nom_prenom, $photo, $nomine, $points) = $data;

        // Exécutez la requête préparée
        if ($stmt->execute()) {
            echo "Nouvel enregistrement inséré avec succès<br>";
        } else {
            echo "Erreur lors de l'insertion de l'enregistrement : " . $stmt->error . "<br>";
        }
    }

    // Fermez la déclaration préparée
    $stmt->close();
} else {
    echo "Erreur lors de la préparation de la requête : " . $conn->error . "<br>";
}

// Fermez la connexion à la base de données
$conn->close();
?>
