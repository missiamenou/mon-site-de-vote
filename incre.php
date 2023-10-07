<?php
// Configuration de la base de données
require_once 'dbconnect.php';

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération de l'ID du candidat depuis la requête POST
$candidateId = $_POST['id']; // ID du candidat


// Récupération de l'adresse IP de l'utilisateur
$ip = $_SERVER['REMOTE_ADDR']; // Adresse IP de l'utilisateur

// Vérification si l'adresse IP a déjà voté pour un candidat dans les 24 dernières heures
$checkQuery = "SELECT COUNT(*) as count FROM vote WHERE ip_user = '$ip' AND vote_date >= NOW() - INTERVAL 24 HOUR";
$result = $conn->query($checkQuery);
$row = $result->fetch_assoc();
$count = $row['count'];

if ($count > 0) {
    // L'utilisateur a déjà voté pour un candidat dans les 24 dernières heures
    ?>
    <!DOCTYPE html>
                    <html lang="fr">

                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                    </head>

                    <body>

                        <script>
                            Swal.fire({
                                title: 'Erreur!',
                                text: 'Vous avez déjà voté pour ce candidat dans les 24 dernières heures. Vous ne pouvez pas voter à nouveau pour le moment.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Rediriger l'utilisateur vers une page de confirmation ou de remerciement
                                window.location.href = 'section2.php';
                            });
                        </script>

                    </body>

                    </html>
                    <?php
                    exit(); // Assurez-vous de sortir du script
} else {
    // Incrémentation du champ 'points' dans la table 'candidat'
    $updateQuery = "UPDATE candidat SET points = points + 1 WHERE id = $candidateId";
    if ($conn->query($updateQuery) === TRUE) {
        // Insertion d'un enregistrement dans la table 'vote' pour enregistrer l'IP et l'ID du candidat
        $insertQuery = "INSERT INTO vote (ip_user, candidat_id, vote_date) VALUES ('$ip', $candidateId, NOW())";
        if ($conn->query($insertQuery) === TRUE) {
            // Sélectionnez les nouveaux points après l'incrémentation
            $selectPointsQuery = "SELECT points FROM candidat WHERE id = $candidateId";
            $result = $conn->query($selectPointsQuery);
            $row = $result->fetch_assoc();
            $newPoints = $row['points'];

            // Retournez les nouveaux points
            echo $newPoints;

            // Affichez le popup de confirmation
            ?>
            <!DOCTYPE html>
            <html lang="fr">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            </head>

            <body>

            <script>
                Swal.fire({
                    title: 'Succès!',
                    text: 'Votre vote a été enregistré avec succès!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    // Rediriger l'utilisateur vers une page de confirmation ou de remerciement
                    window.location.href = 'section2.php';
                });
            </script>

            </body>
            </html>
        <?php
             echo "";
             exit(); // Assurez-vous de sortir du script après l'affichage du pop-up

        } else {
           // En cas d'erreur de requête, afficher un pop-up d'erreur
           echo "<script>
           Swal.fire({
               title: 'warning!',
               text: 'Une erreur est survenue lors de l'enregistrement de votre vote.',
               icon: 'error',
               confirmButtonText: 'OK'
           });
       </script>";
        }
    } else {
         // En cas d'erreur de requête, afficher un pop-up d'erreur
         echo "<script>
         Swal.fire({
             title: 'warning!',
             text: 'Une erreur est survenue lors de l'enregistrement de votre vote.',
             icon: 'error',
             confirmButtonText: 'OK'
         });
     </script>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>