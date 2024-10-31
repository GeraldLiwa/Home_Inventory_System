<?php
$connection = new mysqli("localhost", "root", "", "group10");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$query = "SELECT ID, item_name, number_items, supplier, item_status FROM Items";
$result = $connection->query($query);

$items = [];
while ($item = $result->fetch_assoc()) {
    $items[] = $item;
}

echo json_encode($items);
$connection->close();
?>
