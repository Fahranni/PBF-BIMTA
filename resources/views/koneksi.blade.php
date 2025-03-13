<?php
// Koneksi ke database
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "bimbingan";

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>

