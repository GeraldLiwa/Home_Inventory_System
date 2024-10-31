<?php
$conn = new mysqli('localhost', "root", "", 'group10');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$itemName = $_POST['name'];
$category = $_POST['category'];
$dop = $_POST['dop'];
$not = $_POST['not'];
$maintanance = $_POST['maintance'];
$supplier = $_POST['supplier'];
$amount = $_POST['amount'];
$warrant = $_POST['warrant'];
$status = $_POST['status'];
$comment = $_POST['comment'];

if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $ipicture = $_FILES['picture']['name'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($ipicture);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an actual image
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['picture']['tmp_name']);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
            $sql = "INSERT INTO Items (item_name, category, date_of_purchase, picture, number_items, maintenance_history, supplier, amount_bought, warranty, item_status, comments)
                    VALUES ('$itemName', '$category', '$dop', '$ipicture', '$not', '$maintanance', '$supplier', '$amount', '$warrant', '$status', '$comment')";

            if ($conn->query($sql) === TRUE) {
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "No file uploaded or there was an upload error.";
}
