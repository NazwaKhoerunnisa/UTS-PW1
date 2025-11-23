<?php
include "connection.php";
header("Content-Type: application/json");

$query = "SELECT * FROM produk";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
