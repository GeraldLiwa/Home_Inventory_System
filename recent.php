<!doctype>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Inventory Management</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head> 
    
    <script>
        

    </script>
    <body>
    <header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index,php"  >HOME</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="#">REPORT</a></li>
                <li><a href="additem.html">ADD ITEM</a></li>
                <li><a href="#">SETTINGS</a></li>
                <li><a href="index,php">ABOUT US</a></li>
                
            </ul>
            <div class="profile">
                <img src="https://i.imgur.com/UXuVElq.png" alt="Profile Image">
            </div>
        </nav>
    </header>

    <div class="mmain" >
        <div class="clicks">
            <div class="recent-label" style="border: solid red;">
                <div class="recent-btn"  >
                    <div  >
                        <p style="margin: 2px;">recently added items</p>
                    </div>
                    <div class="recent-icon">
                        <img src="images/arrow-png-image.png" alt="">
                    </div>
                </div>
            </div>
            <?php
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Fetch last 5 items from the Items table
$query = "SELECT item_name FROM Items ORDER BY id DESC LIMIT 5";
$result = $connection->query($query);

$recentItems = [];
while ($row = $result->fetch_assoc()) {
    $recentItems[] = $row['item_name'];
}
?>
            <!-- Last added item 1 -->
        <a href="#" class="uk" id="bt1">
            <div class="recent-btn">
                <p><?php echo isset($recentItems[0]) ? $recentItems[0] : 'No Item'; ?></p>
            </div>
        </a>

        <!-- Last added item 2 -->
        <a href="#" class="uk" id="bt2">
            <div class="recent-btn">
                <p><?php echo isset($recentItems[1]) ? $recentItems[1] : 'No Item'; ?></p>
            </div>
        </a>

        <!-- Last added item 3 -->
        <a href="#" class="uk" id="bt3">
            <div class="recent-btn">
                <p><?php echo isset($recentItems[2]) ? $recentItems[2] : 'No Item'; ?></p>
            </div>
        </a>

        <!-- Last added item 4 -->
        <a href="#" class="uk" id="bt4">
            <div class="recent-btn">
                <p><?php echo isset($recentItems[3]) ? $recentItems[3] : 'No Item'; ?></p>
            </div>
        </a>

        <!-- Last added item 5 -->
        <a href="#" class="uk" id="bt5">
            <div class="recent-btn">
                <p><?php echo isset($recentItems[4]) ? $recentItems[4] : 'No Item'; ?></p>
            </div>
        </a>
           
            
        </div >


        <div id="recent-content " style="border: solid rgb(38, 0, 255); margin-left: 20px; border-radius: 7px; background-color: #909497;">

        <?php 
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch the last five added items from the Items table
$query = "SELECT item_name, number_items, supplier, item_status, amount_bought, warranty, category, comments, picture 
          FROM Items ORDER BY id DESC LIMIT 5";
$result = $connection->query($query);

// Initialize an array to hold the items
$items = $result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Recent Items -->
<div id="recentItems">
    <?php foreach ($items as $index => $item): ?>
        <div style="display: none;" id="recent<?php echo $index + 1; ?>"> 
            <div class="content">
                <div style="display: flex; margin: 20px;">
                    <div class="recent-item-pic">
                        <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Item Image <?php echo $index + 1; ?>">
                    </div>
                    <div style="border: solid; margin-left: 30px; width: 700px; padding-left: 10px; font-size: 25px; font-weight: bolder; border-radius: 10px; margin-top: 20px;">
                        <label>QUANTITY: <span style="color: red; padding-right: 50px;"><?php echo htmlspecialchars($item['number_items']); ?></span></label><br><br>
                        <label>SUPPLIER: <span style="color: red; padding-right: 0px;"><?php echo htmlspecialchars($item['supplier']); ?></span></label><br><br>
                        <label>LOCATION: <span style="color: red; padding-right: 50px;"><?php echo htmlspecialchars($item['item_status']); ?></span></label><br><br>
                        <label>VALUE: <span style="color: red; padding-right: 60px;"><?php echo htmlspecialchars($item['amount_bought']); ?></span></label><br><br>
                        <label>EXPIRE DATE: <span style="color: red;"><?php echo htmlspecialchars($item['warranty']); ?></span></label><br><br>
                        <label>CATEGORY: <span style="color: red;"><?php echo htmlspecialchars($item['category']); ?></span></label><br><br>
                        <label>CONDITION: <span style="color: red;"><?php echo htmlspecialchars($item['item_status']); ?></span></label><br><br>
                        <label>COMMENTS: <span style="color: red;"><?php echo htmlspecialchars($item['comments']); ?></span></label>
                    </div>
                </div>
                <div style="font-size: 25px; font-weight: bolder; margin-bottom: 20px; display: flex;">
                    <div style="margin-right: 36%;">
                        <label>NAME OF ITEM: <span style="color: red; padding-right: 50px;"><?php echo htmlspecialchars($item['item_name']); ?></span></label>
                    </div>
                    <div style="background-color: orange; width: 200px; border-radius: 7px; height: 30px;">
                        <a href="#" style="text-decoration: none; padding-left: 40%;">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
$connection->close(); // Close the database connection
?>
        </div>
    

    </div>

        



    <!-- footer section start -->
 <div class="footer_section">
    <div class="container">
       <div class="footer_section_2">
          <div class="row">
             <div class="ttlee">
                <h2 class="useful_text">Quick     Links</h2>
                <div class="footer_menu">
                   <ul>
                      <li class="active"><a href="index.php"></a></li>
                      <li><a href="index.php">Home</a></li>
                      <li><a href="index.php">About Us</a></li>
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
                <input type="email" class="Enter_text" placeholder="Enter your email" name="Enter Your Email" required><br><br>
                <input type="email" class="Enter_text" placeholder="Enter your question here" name="Enter Your Email" required>
                <div class="subscribe_bt"><a href="#">Submit</a></div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- footer section end -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
    // Define arrays for button IDs and the corresponding recent content elements
    const buttons = ['bt1', 'bt2', 'bt3', 'bt4', 'bt5'];
    var r1 = document.getElementById("recent1");
    var r2 = document.getElementById("recent2");
    var r3 = document.getElementById("recent3");
    var r4 = document.getElementById("recent4");
    var r5 = document.getElementById("recent5");

    const recentContents = [r1, r2, r3, r4, r5];

    // Add click event listeners to each button
    buttons.forEach(function(buttonId, index) {
        const buttonElement = document.getElementById(buttonId);
        if (buttonElement) {
            buttonElement.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                
                // Hide all recent content sections
                recentContents.forEach(function(content) {
                    content.style.display = 'none';
                });

                // Show the clicked one
                recentContents[index].style.display = 'block';
            });
        }
    });
});


  </script>
    </body>  
</html>