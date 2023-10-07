<?php
$servername = "localhost";
$username = "spcom1_komi";
$password = "SI8Z?Bihv8kg";
$dbname = "spcom1_komibd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL pour obtenir la liste de toutes les tables dans la base de données
$sql = "SHOW TABLES";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $tableName = $row["spcom1_komibd"];
    // Requête pour supprimer chaque table
    $dropSql = "DROP TABLE $tableName";
    if ($conn->query($dropSql) === TRUE) {
      echo "Table $tableName dropped successfully<br>";
    } else {
      echo "Error dropping table $tableName: " . $conn->error . "<br>";
    }
  }
} else {
  echo "No tables found in the database";
}

$conn->close();
?>
