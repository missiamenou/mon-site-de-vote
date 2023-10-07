<?php
// Démarre la session si ce n'est pas déjà fait
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Détruit la session
session_destroy();

// Redirige vers la page de connexion ou une autre page de votre choix
header("Location: connexion.php");
exit();
?>