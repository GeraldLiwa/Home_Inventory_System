<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Update user information in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $connection->real_escape_string($_POST['username']);
    $useraddress = $connection->real_escape_string($_POST['useraddress']);
    $phonenumber = $connection->real_escape_string($_POST['phonenumer']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashed for security
    $email = $connection->real_escape_string($_POST['email']);

    $query = "UPDATE registration SET useraddress='$useraddress', phonenumer='$phonenumber', 
              password='$password', email='$email' WHERE username='$username'";

    if ($connection->query($query) === TRUE) {
        echo "<script>alert('Profile updated successfully'); window.location.href='dashboard.php';</script>";
    } else {
        echo "Error updating profile: " . $connection->error;
    }
}

$connection->close();
?>
