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
