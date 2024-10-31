<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$pnumber = $_POST['pnumber'] ?? '';
$address = $_POST['address'] ?? '';
$password = $_POST['password'] ?? '';
$confirmpassword = $_POST['confirmpassword'] ?? '';

// Check if passwords match
if ($password !== $confirmpassword) {
    echo "<script>document.getElementById('errorDiv').innerText = 'Passwords do not match.';</script>";
    exit;
}

// Check if username already exists
$sql_check = "SELECT * FROM registration WHERE username = '$name'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "<script>document.getElementById('errorDiv').innerText = 'Username already used. Please choose a different one.';</script>";
    exit;
}

// Handle profile picture upload
$profilePicture = $_FILES['profile_picture'] ?? null;
$targetDir = "images/";
$targetFile = null;

if ($profilePicture && !empty($profilePicture["tmp_name"])) {
    $targetFile = $targetDir . basename($profilePicture["name"]);
    if (!move_uploaded_file($profilePicture["tmp_name"], $targetFile)) {
        echo "<script>document.getElementById('errorDiv').innerText = 'Error uploading profile picture.';</script>";
        exit;
    }
}

// Insert data into the registration table
$sql = "INSERT INTO registration (username, phonenumer, useraddress, password, profile_picture, email) 
        VALUES ('$name', '$pnumber', '$address', '$password', '$targetFile', '$email')";

if ($conn->query($sql) === TRUE) {
    header("Location: dashboard.php"); // Redirect to recent page
    exit;
} else {
    echo "<script>document.getElementById('errorDiv').innerText = 'Error: " . $conn->error . "';</script>";
}

$conn->close();

