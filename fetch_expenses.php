<?php
header('Content-Type: application/json');

// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Calculate monthly expenses by category
$query = "SELECT category, SUM(amount_bought) as total_amount 
          FROM Items 
          GROUP BY category";
$result = $connection->query($query);

$monthlySummary = [];
while ($row = $result->fetch_assoc()) {
    $monthlySummary[$row['category']] = (float)$row['total_amount'];
}

// Calculate daily average expenditure
$query = "SELECT SUM(amount_bought) as total_amount, COUNT(DISTINCT DATE(date_added)) as days_count 
          FROM Items";
$result = $connection->query($query);
$row = $result->fetch_assoc();

$totalAmount = (float)$row['total_amount'];
$daysCount = (int)$row['days_count'];
$dailyAverage = $daysCount > 0 ? $totalAmount / $daysCount : 0;

// Close the database connection
$connection->close();

// Return the data as JSON
echo json_encode([
    'monthlySummary' => $monthlySummary,
    'dailyAverage' => $dailyAverage
]);
?>
