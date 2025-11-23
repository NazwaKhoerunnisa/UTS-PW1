<?php
include "connection.php";
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'] ?? null;

if ($id == null) {
    echo json_encode(["message" => "ID tidak ditemukan"]);
    exit;
}

$query = "DELETE FROM produk WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Delete berhasil"]);
} else {
    echo json_encode(["message" => "Delete gagal"]);
}
?>
