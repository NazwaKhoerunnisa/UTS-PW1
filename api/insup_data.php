<?php
include "connection.php";
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$name  = $data['name'] ?? null;
$price = $data['price'] ?? null;
$image = $data['image'] ?? null;
$id    = $data['id'] ?? null;

// INSERT
if ($id == null) {
    $query = "INSERT INTO produk (name, price, image) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sis", $name, $price, $image);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Insert berhasil"]);
    } else {
        echo json_encode(["message" => "Insert gagal"]);
    }
    exit;
}

// UPDATE
$query = "UPDATE produk SET name=?, price=?, image=? WHERE id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param("sisi", $name, $price, $image, $id);

if ($stmt->execute()) {
    echo json_encode(["message" => "Update berhasil"]);
} else {
    echo json_encode(["message" => "Update gagal"]);
}
?>
