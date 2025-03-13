<?php

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbname = "bimbingan";

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    echo json_encode(["eror" => "Koneksi Gagal: ". $conn->connect_error]);
    exit;
}
$type = isset($_GET['type'] ) ? $_GET['type'] : '';

if ($type === 'dosen'){
    $sql = "SELECT * FROM dosen_pembimbing";
}elseif($type === 'mahasiswa'){
    $sql = "SELECT * FROM mahasiswa";
}else{
    echo json_encode(["error" => "Query gagal: " . $conn->error]);
    exit;
}


$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "Query gagal: " . $conn->error]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

if (empty($data)) {
    echo json_encode(["message" => "Data tidak ditemukan"]);
} else {
    echo json_encode($data, JSON_PRETTY_PRINT);
}

$conn->close();
?>