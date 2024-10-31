<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Household Item Tracking & Budgeting</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* General styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
}

header {
    background-color: #2c3e50;
    color: white;
    padding: 1rem;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin: 0 1rem;
}

nav ul li a {
    color: white;
    text-decoration: none;
}

section {
    padding: 2rem;
}

h2 {
    text-align: center;
    color: #333;
}

.overview-container {
    display: flex;
    justify-content: space-around;
    margin-top: 2rem;
}

.box {
    background-color: #e1e4e8;
    border-radius: 5px;
    padding: 1.5rem;
    text-align: center;
    width: 200px;
}

.box h3 {
    margin: 0;
    font-size: 1.2rem;
    color: #2c3e50;
}

footer {
    background-color: #2c3e50;
    color: white;
    text-align: center;
    padding: 1rem;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <header >
        <nav style="padding-top:30px;">
            <ul>
                <li><a href="dashboard.php">DASHBOARD</a></li>
                <li><a href="additem.html">ADD ITEMS</a></li>
                
                <li><a href="profile.php">SETTINGS</a></li>
                <li><a href="index.php">ABOUT US</a></li>
                <li><a href="report.php">REPORT</a></li>
                
            </ul>
        </nav>
    </header>
    
    <?php
// Database connection
$conn = new mysqli('localhost', "root", "", 'group10');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get total number of items (sum of number_of_items)
$sqlTotalItems = "SELECT SUM(number_items) AS totalItems FROM Items"; // Sum instead of count
$resultTotalItems = $conn->query($sqlTotalItems);
$rowTotalItems = $resultTotalItems->fetch_assoc();
$totalItems = $rowTotalItems['totalItems'] ? $rowTotalItems['totalItems'] : 0; // Default to 0 if NULL

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
?>

<!-- The HTML part starts here -->
<section id="dashboard" >
    <h2>Dashboard Overview</h2>
    <div style="display: block;" style="margin-left:20px;">
        <div class="overview-container">
            <div class="box">
                <h3>Items Sold</h3>
                <p id="total-expenses"><?php echo $itemsSold; ?></p>
            </div>
            <div class="box">
                <h3>Items Expired</h3>
                <p id="total-budget"><?php echo $itemsExpired; ?></p>
            </div>
            <div class="box">
                <h3>Items Not in Use</h3>
                <p id="remaining-budget"><?php echo $itemsNotInUse; ?></p>
            </div>
        </div>

        <div class="overview-container" style="">
            <div class="box">
                <h3>Total Categories</h3>
                <p id="total-items"><?php echo $totalCategories; ?></p>
            </div>
            <div class="box">
                <h3>Total Items</h3>
                <p id="total-expenses"><?php echo $totalItems; ?>++</p>
            </div>
            <div class="box">
                <h3>Amount Used</h3>
                <p id="total-budget">MWK<?php echo $totalAmountUsed; ?> </p>
            </div>
            <div class="box">
                <h3>Items in Use</h3>
                <p id="remaining-budget"><?php echo $itemsInUse; ?>++</p>
            </div>
        </div>
    </div>
</section>


            <div class="overview-container" >
                <div class="box" style="background-color:orange;color:white;">
                    <a href="recent.php"style="text-decoration: none;">
                        <h3>See recent</h3>
                        <h3>Items</h3>
                    </a>
                </div>
                <div class="box" style="background-color:orange;">
                    <a href="update.php" style="text-decoration: none;">
                        <h3>Update your</h3>
                        <h3>Items</h3>
                    </a>
                </div>
                
            </div>
        </div>
    </section>

    
     </div><div class="footer_section" style="margin-top:20px;">
        <div class="container">
           <div class="footer_section_2">
              <div class="row">
                 <div class="ttlee">
                    <h2 class="useful_text">Quick Links</h2>
                    <div class="footer_menu">
                       <ul>
                          <li class="active"><a href="index.php"></a></li>
                          <li><a href="#">Home</a></li>
                          <li><a href="#">About Us</a></li>
                          <li><a href="#">Report</a></li>
                          <li><a href="#">Contact Us</a></li>
                          
                       </ul>
                    </div>
                 </div>
                 <div class="ttle">
                    <h2 class="useful_text">Blog</h2>
                    <p class="footer_text">"Stay updated with the latest trends and tips on managing your home inventory efficiently. Our blog covers everything from organizational hacks to important updates in the world of home security."</p>
                    <div class="social_icon">
                       <ul>
                          <li><a href="https://www.facebook.com/login"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                       </ul>
                    </div>
                 </div>
                 <div class="ttle">
                    <h2 class="useful_text">Contact us</h2>
                    <input type="email" class="Enter_text" placeholder="Enter Your Email" name="Enter Your Email" required><br><br>
                    <input type="email" class="Enter_text" placeholder="Enter your question here" name="Enter Your Email" required>
                    <div class="subscribe_bt"><a href="#">Submit</a></div>
                 </div>
              </div>
           </div>
        </div>
     </div>
</body>
</html>
