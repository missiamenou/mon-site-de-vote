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

// sql to create table
$sql = "CREATE TABLE candidat (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom_prenom varchar(255) NOT NULL,
photo varchar(255) NOT NULL,
nomine varchar(255) NOT NULL,
points int(11) NOT NULL
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table candidat created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>