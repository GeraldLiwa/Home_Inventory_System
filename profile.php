<?php
$connection = new mysqli("localhost", "root", "", "group10");
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$message = ""; // Variable to hold messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_username = $_POST['current_username'];
    $current_password = $_POST['current_password'];
    $new_username = $_POST['new_username'];
    $new_email = $_POST['new_email'];
    $new_phonenumber = $_POST['new_phonenumber'];
    $new_password = $_POST['new_password'];

    // Validate current credentials
    $stmt = $connection->prepare("SELECT * FROM registration WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $current_username, $current_password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Initialize update fields
        $update_fields = [];

        if ($new_username) $update_fields['username'] = $new_username;
        if ($new_email) $update_fields['email'] = $new_email;
        if ($new_phonenumber) $update_fields['phonenumer'] = $new_phonenumber;
        if ($new_password) $update_fields['password'] = $new_password;

        // Handle profile picture upload
        if (!empty($_FILES['new_picture']['name'])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["new_picture"]["name"]);
            if (move_uploaded_file($_FILES["new_picture"]["tmp_name"], $target_file)) {
                $update_fields['profile_picture'] = $target_file;
            }
        }

        if (!empty($update_fields)) {
            // Construct update query
            $update_query = "UPDATE registration SET ";
            $params = [];
            foreach ($update_fields as $column => $value) {
                $update_query .= "$column = ?, ";
                $params[] = $value;
            }
            $update_query = rtrim($update_query, ', ') . " WHERE username = ? AND password = ?";
            $params[] = $current_username;
            $params[] = $current_password;

            // Prepare and execute update statement
            $stmt = $connection->prepare($update_query);
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);

            if ($stmt->execute()) {
                $message = "Profile updated successfully!";
            } else {
                $message = "Error updating profile. Please try again.";
            }
        } else {
            $message = "No updates provided. Please enter new information to update.";
        }
    } else {
        $message = "Incorrect username or password. Please enter correct details.";
    }

    // Output the message to JavaScript
    echo "<script>
        window.onload = function() {
            showMessage('$message');
        };
    </script>";
}

$connection->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Profile</title>

    <head>
    
    </head>
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; }
        .container { width: 400px; margin: auto; padding: 20px; background: #f4f4f4; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        h2 { text-align: center; color: #333; }
        label { font-weight: bold; display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="email"], input[type="password"], input[type="file"] {
            width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;
        }
        button { width: 100%; padding: 10px; border: none; border-radius: 5px; background: #007BFF; color: #fff; font-size: 16px; cursor: pointer; }
        button:hover { background: #0056b3; }

        /* Popup styling */
        #popup-message {
            display: none; 
            position: fixed; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%); 
            z-index: 1000; 
            padding: 20px; 
            background: #ff4c4c; 
            color: white; 
            border-radius: 10px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        #overlay {
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0, 0, 0, 0.5); 
            z-index: 999;
        }
    </style>
</head>
<header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php"  >HOME</a></li>
                <li><a href="categories.php"><span style="color: blueviolet;">CATEGORIES</span></a></li>
                <li><a href="report.php">REPORT</a></li>
                <li><a href="additem.html">ADD ITEM</a></li>
                <li><a href="profile.php">SETTINGS</a></li>
                <li><a href="index.php">ABOUT US</a></li>
                
            </ul>
            <div class="profile">
                <img src="images/pro icon.png" alt="Profile Image">
            </div>
        </nav>
    </header>
<body style="border: red; background-color:#797d7f;">


<div class="container" style="; margin-top:40px;">
    <h2 style="color:blue;">Edit  your Profile here!</h2>
    <form id="" action="" method="POST" enctype="multipart/form-data">
        <label>Current Username</label>
        <input type="text" name="current_username" required>
        
        <label>Current Password</label>
        <input type="password" name="current_password" required>
        
        <label>New Username</label>
        <input type="text" name="new_username">

        <label>New Email</label>
        <input type="email" name="new_email">
        
        <label>New Phone Number</label>
        <input type="text" name="new_phonenumber">
        
        <label>New Password</label>
        <input type="password" name="new_password">
        
        <label>Update Profile Picture</label>
        <input type="file" name="new_picture" accept="image/*">
        
        <button type="submit">Update Profile</button>
        <a href="dashboard.php">
        <button type="button" style="background-color:orange;">cancel</button>
        </a>
    </form>
</div>



<!-- Popup Message -->
<div id="overlay"></div>
<div id="popup-message"></div>

<script>
    function showMessage(message) {
        document.getElementById('popup-message').innerText = message;
        document.getElementById('popup-message').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }

    document.getElementById('overlay').onclick = function() {
        this.style.display = 'none';
        document.getElementById('popup-message').style.display = 'none';
    };
</script>



</body>
</html>
