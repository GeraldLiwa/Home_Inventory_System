<!DOCTYPE html>
<html>
    <body>
        <?php
        // Retrieve form data
        $$name = $_POST["name"];
        $$user_password = $_POST["password"]; // Renaming this to avoid conflict with database password
        
        // SQL query
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$user_password')";
        
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $db_password = "";  // This is the database password
        $dbname = "my_database";
        
        // Create connection
        $conn = new mysqli($servername, $username, $db_password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        // Close connection
        $conn->close();

        // Hash the password before inserting it into the database
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);
        
        // SQL query with hashed password
        $sql = "INSERT INTO users (name, password) VALUES ('$name', '$hashed_password')";
        
        ?>
        
        <div style="background-color: azure; border: solid 2px red; margin-right: 30%; margin-left: 30%; font-weight: bolder; font-size: 20px;">
            <form action="connect.php" method="POST">
                Name <br>
                <input type="text" name="name" id="name" required><br><br>
    
                Password <br>
                <input type="password" name="password" id="password" required>
                <div style="margin-right: 30%; margin-left: 30%; font-weight: bolder; font-size: 20px;">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </body>
</html>
