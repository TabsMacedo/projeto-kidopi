<!-- configurações para conectar com um banco de dados -->
<?php
$servername = "localhost";
$username = "root";
$password = "senha";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>