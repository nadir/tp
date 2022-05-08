<?php
$servername = "localhost";
$username = "test";
$password = "bruh";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = $conn->prepare("DELETE FROM etudiants WHERE Matricule=?");
$sql->bind_param("i", $_POST['etudiant']);
if ($sql->execute()) {
    header("Location: index.php");
} else {
    echo "Error while deleting student";
}
