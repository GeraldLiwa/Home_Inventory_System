<?php
// Start session
session_start();

// Initialize error message variable
$error = '';

// Database connection
$conn = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Verify user credentials
    $sql = "SELECT * FROM registration WHERE (username = '$username' OR email = '$username') AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Credentials are correct, store user information in the session and redirect
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to recent page on successful login
        exit;
    } else {
        // Set error message for the popup
        $error = "Invalid username or password.";
    }
}

// Close database connection
$conn->close();
?>

<!-- JavaScript to show the popup if there's an error -->
<script>
    <?php if (!empty($error)) : ?>
        document.getElementById('popupMessage').innerText = "<?php echo $error; ?>";
        document.getElementById('errorPopup').style.display = "block";
    <?php endif; ?>

    // Close popup functionality
    document.getElementById('closePopup').onclick = function() {
        document.getElementById('errorPopup').style.display = "none";
    }

    // Close the popup if the user clicks anywhere outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById('errorPopup')) {
            document.getElementById('errorPopup').style.display = "none";
        }
    }
</script>
