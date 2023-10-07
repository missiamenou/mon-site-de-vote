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
$sql = "CREATE TABLE vote (
id_user INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ip_user varchar(45) NOT NULL,
candidat_id int(11) NOT NULL,
vote_date timestamp NULL DEFAULT current_timestamp()
-- reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table vote created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>