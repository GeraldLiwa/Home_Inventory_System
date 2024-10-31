<?php
$connection = new mysqli("localhost", "root", "", "group10");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$item_id = $_POST['item_id'];
$item_name = $_POST['item_name'];
$number_items = $_POST['number_items'];
$supplier = $_POST['supplier'];
$item_status = $_POST['item_status'];

$query = "UPDATE Items SET item_name = ?, number_items = ?, supplier = ?, item_status = ? WHERE ID = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sisii", $item_name, $number_items, $supplier, $item_status, $item_id);

$response = ["success" => $stmt->execute()];
echo json_encode($response);

$stmt->close();
$connection->close();
?>
