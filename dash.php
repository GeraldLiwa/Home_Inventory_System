<?php
// Database connection
$conn = new mysqli('localhost', "root", "", 'group10');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get total number of users
$sqlTotalUsers = "SELECT COUNT(username) AS totalUsers FROM Users";
$resultTotalUsers = $conn->query($sqlTotalUsers);
$rowTotalUsers = $resultTotalUsers->fetch_assoc();
$totalUsers = $rowTotalUsers['totalUsers'];

// Query to get total number of items
$sqlTotalItems = "SELECT COUNT(*) AS totalItems FROM Items";
$resultTotalItems = $conn->query($sqlTotalItems);
$rowTotalItems = $resultTotalItems->fetch_assoc();
$totalItems = $rowTotalItems['totalItems'];

// Query to get total number of categories
$sqlTotalCategories = "SELECT COUNT(DISTINCT category) AS totalCategories FROM Items";
$resultTotalCategories = $conn->query($sqlTotalCategories);
$rowTotalCategories = $resultTotalCategories->fetch_assoc();
$totalCategories = $rowTotalCategories['totalCategories'];

// Query to get items in use
$sqlItemsInUse = "SELECT COUNT(*) AS itemsInUse FROM Items WHERE item_status = 'in use'";
$resultItemsInUse = $conn->query($sqlItemsInUse);
$rowItemsInUse = $resultItemsInUse->fetch_assoc();
$itemsInUse = $rowItemsInUse['itemsInUse'];

// Query to get items not in use
$sqlItemsNotInUse = "SELECT COUNT(*) AS itemsNotInUse FROM Items WHERE item_status = 'not in use'";
$resultItemsNotInUse = $conn->query($sqlItemsNotInUse);
$rowItemsNotInUse = $resultItemsNotInUse->fetch_assoc();
$itemsNotInUse = $rowItemsNotInUse['itemsNotInUse'];

// Query to get total amount spent (assuming `amount_bought` is the price)
$sqlTotalAmountUsed = "SELECT SUM(amount_bought) AS totalAmountUsed FROM Items";
$resultTotalAmountUsed = $conn->query($sqlTotalAmountUsed);
$rowTotalAmountUsed = $resultTotalAmountUsed->fetch_assoc();
$totalAmountUsed = $rowTotalAmountUsed['totalAmountUsed'];

// Query to get expired items (assuming `warranty` column holds the expiration date)
$sqlItemsExpired = "SELECT COUNT(*) AS itemsExpired FROM Items WHERE warranty < CURDATE()";
$resultItemsExpired = $conn->query($sqlItemsExpired);
$rowItemsExpired = $resultItemsExpired->fetch_assoc();
$itemsExpired = $rowItemsExpired['itemsExpired'];

// Query to get sold items (assuming `sold` status in `item_status`)
$sqlItemsSold = "SELECT COUNT(*) AS itemsSold FROM Items WHERE item_status = 'sold'";
$resultItemsSold = $conn->query($sqlItemsSold);
$rowItemsSold = $resultItemsSold->fetch_assoc();
$itemsSold = $rowItemsSold['itemsSold'];

// Close the database connection
$conn->close();

