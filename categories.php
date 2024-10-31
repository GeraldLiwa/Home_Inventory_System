<!doctype>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Inventory Management</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head> 
    
    <STYle>
        .recent-btn{
            height: 40px;
        }
        #m img{
            height: 50px;
        }
    </STYle>
    <body>
    <header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php">HOME</a></li>
                <li><a href=""><span style="color: blueviolet;">CATEGORIES</span></a></li>
                <li><a href="#">REPORT</a></li>
                <li><a href="additem.html">ADD ITEM</a></li>
                <li><a href="profile.php">SETTINGS</a></li>
                <li><a href="index.php">ABOUT US</a></li>
                
            </ul>
            <div class="profile">
                <img src="images/pro icon.png" alt="Profile Image">
            </div>
        </nav>
    </header>

    <div class="mmain" >
        <div class="clicks">
            <div class="recent-label" >
                <div class="recent-btn"  >
                    
                    <div  >
                        <p style="margin: 2px;">recently added items</p>
                    </div>
                    <div class="recent-icon">
                        <img src="images/arrow-png-image.png" alt="">
                    </div>
                    
                </div>
            </div>
            <a href="" class="uk" id="bt1">
                <div class="recent-btn" style="display: flex;">
                    <div class="ikoz">
                        <img src="images/furniture-icon.png" alt="">
                    </div>
                    <div>
                        <p>Furniture</p>
                    </div>
                    
                </div>
            </a>
            
            <a href="" class="uk" id="bt2">
                <div class="recent-btn" style="display: flex;">
                    <div class="ikoz">
                        <img src="images/elecronics.png" alt="">
                    </div>
                    <div>
                        <p>ELECTRONICS</p>
                    </div>
                    
                </div>
            </a>
            <a href="" class="uk" id="bt3">
                <div class="recent-btn" style="display: flex;">
                    <div class="ikoz">
                        <img src="images/appliances ico.png" alt="">
                    </div>
                    <div>
                        <p>APPLIANCES</p>
                    </div>
                    
                </div>
            </a>
            <a href="" class="uk" id="bt4">
                <div class="recent-btn" style="display: flex;">
                    <div class="ikoz">
                        <img src="images/kitchenware.png" alt="">
                    </div>
                    <div>
                        <p>KITCHENWARE</p>
                    </div>
                    
                </div>
            </a>
            <a href="" class="uk" id="bt5" >
                <div class="recent-btn" style="display: flex;">
                    <div class="ikoz">
                        <img src="images/tools icon.png" alt="">
                    </div>
                    <div>
                        <p>Tools & equipment</p>
                    </div>
                    
                </div>
            </a>
            <div class="recent-label" >
                <div class="recent-btn" style="display: flex; background-color:#2471a3;" >
                <div class="recent-icon" style="margin-bottom:0px;">
                        <img src="images/happyemoji.png" style="width:70px; height:50px;" alt="">
                    </div>
                    <div  >
                        <p style="margin: 2px;">we love you <br> keep on using!</p>
                    </div>
                    
                    
                </div>
            </div>
           
            
        </div >


        <div id="recent-content " style="border: solid rgb(255, 0, 43); margin-left: 50px; border-radius: 7px; background-color: #909497; height: 100%;">

            <!-- Recent Item 1 -->
            <?php 
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all items from the Items table that are under the "furniture" category
$query = "SELECT item_name, number_items, supplier, item_status, picture 
          FROM Items WHERE category = 'furniture'";
$result = $connection->query($query);
?>

<!-- Recent Items -->
<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent1">
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Storage</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Initialize index for table row
                $index = 1; 
                // Loop through each item and display it in the table
                while ($item = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td class="index-cell"><?php echo $index++; ?></td>
                    <td class="image-cell">
                        <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Image" style="width: 100px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                    <td>Sitting Room</td> <!-- Change this if you have a storage field -->
                    <td><?php echo htmlspecialchars($item['item_status']); ?></td>
                    <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                    <td class="action-btns">
                        <button class="view-btn">
                            <div style="display: flex;">
                                <div class="ikons">
                                    <img src="images/view.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">View</span>
                                </div>
                            </div>
                        </button>
                        <button class="delete-btn">
                            <div style="display: flex;">
                                <div class="ikon">
                                    <img src="images/delt.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">Delete</span>
                                </div>
                            </div>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$connection->close(); // Close the database connection
?>

            <!-- Recent Item 2 -->
            
            <?php 
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all items from the Items table that are under the "electronics" category
$query = "SELECT item_name, number_items, supplier, item_status, picture 
          FROM Items WHERE category = 'electronics'";
$result = $connection->query($query);
?>

<!-- Recent Items -->
<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent2">
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Storage</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Initialize index for table row
                $index = 1; 
                // Loop through each item and display it in the table
                while ($item = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td class="index-cell"><?php echo $index++; ?></td>
                    <td class="image-cell">
                        <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Image" style="width: 100px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                    <td>Storage Info</td> <!-- Change this if you have a storage field -->
                    <td><?php echo htmlspecialchars($item['item_status']); ?></td>
                    <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                    <td class="action-btns">
                        <button class="view-btn">
                            <div style="display: flex;">
                                <div class="ikons">
                                    <img src="images/view.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">View</span>
                                </div>
                            </div>
                        </button>
                        <button class="delete-btn">
                            <div style="display: flex;">
                                <div class="ikon">
                                    <img src="images/delt.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">Delete</span>
                                </div>
                            </div>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$connection->close(); // Close the database connection
?>

            
            
        
            <!-- Recent Item 3 -->
            <?php 
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all items from the Items table that are under the "appliances" category
$query = "SELECT item_name, number_items, supplier, item_status, picture 
          FROM Items WHERE category = 'appliances'";
$result = $connection->query($query);
?>

<<!-- Recent Items -->
<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent3">
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Storage</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($item = $result->fetch_assoc()): ?>
            <tr data-id="<?php echo $item['ID']; ?>">
               <td class="index-cell"><?php echo $index++; ?></td>
              <td class="image-cell">
            <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Image" style="width: 100px; height: auto;">
             </td>
            <td><?php echo htmlspecialchars($item['item_name']); ?></td>
            <td>Storage Info</td>
            <td><?php echo htmlspecialchars($item['item_status']); ?></td>
            <td><?php echo htmlspecialchars($item['supplier']); ?></td>
            <td class="action-btns">
             <button class="view-btn" onclick="viewImage('uploads/<?php echo htmlspecialchars($item['picture']); ?>')">View</button>
            <button class="delete-btn">Delete</button>
       </td>
        </tr>
        
        <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent6">
    <div>
        
        
    </div>
</div>









<!-- Image Popup -->
<div id="image-popup" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; padding: 20px; background: white; border-radius: 10px;">
    <span onclick="closePopup()" style="cursor: pointer; float: right; font-size: 20px;">&times;</span>
    <img id="popup-image" src="" alt="View Image" style="width: 300px; height: auto;">
</div>
<div id="overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;"></div>

<script>
    // Function to delete an item
    function deleteItem(itemId) {
        if (confirm('Are you sure you want to delete this item?')) {
            fetch(`delete_item.php?id=${itemId}`, {
                method: 'GET'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Item deleted successfully.');
                    document.querySelector(`tr[data-id="${itemId}"]`).remove(); // Remove row from table
                } else {
                    alert('Failed to delete item.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    }

    // Function to view image in popup
    function viewImage(imageSrc) {
        document.getElementById('popup-image').src = imageSrc;
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('image-popup').style.display = 'block';
    }

    // Function to close the popup
    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('image-popup').style.display = 'none';
    }
</script>

<?php
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all items from the Items table that are under the "cooking utensils" category
$query = "SELECT ID, item_name, number_items, supplier, item_status, picture 
          FROM Items WHERE category = 'cooking utensils'";
$result = $connection->query($query);
?>


<!-- Recent Items -->
<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent4">
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Storage</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Initialize index for table row
                $index = 1; 
                // Loop through each item and display it in the table
                while ($item = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td class="index-cell"><?php echo $index++; ?></td>
                    <td class="image-cell">
                        <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Image" style="width: 100px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                    <td>Storage Info</td> <!-- Change this if you have a storage field -->
                    <td><?php echo htmlspecialchars($item['item_status']); ?></td>
                    <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                    <td class="action-btns">
                        <button class="view-btn">
                            <div style="display: flex;">
                                <div class="ikons">
                                    <img src="images/view.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">View</span>
                                </div>
                            </div>
                        </button>
                        <button class="delete-btn">
                            <div style="display: flex;">
                                <div class="ikon">
                                    <img src="images/delt.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">Delete</span>
                                </div>
                            </div>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
$connection->close(); // Close the database connection
?>

        
            <!-- Recent Item 5 -->
            <?php 
// Database connection
$connection = new mysqli("localhost", "root", "", "group10");

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Fetch all items from the Items table that are under the "Tools & Equipment" category
$query = "SELECT item_name, number_items, supplier, item_status, picture 
          FROM Items WHERE category = 'Tools & Equipment'";
$result = $connection->query($query);
?>

<!-- Recent Items -->
<div style="display: none; height: 570px; width: 1200px; border: solid blue; margin: 20px; border-radius: 10px;" id="recent5">
    <div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Storage</th>
                    <th>Status</th>
                    <th>Supplier</th>
                    <th style="width: 180px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Initialize index for table row
                $index = 1; 
                // Loop through each item and display it in the table
                while ($item = $result->fetch_assoc()): 
                ?>
                <tr>
                    <td class="index-cell"><?php echo $index++; ?></td>
                    <td class="image-cell">
                        <img src="uploads/<?php echo htmlspecialchars($item['picture']); ?>" alt="Image" style="width: 100px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($item['item_name']); ?></td>
                    <td>Storage Info</td> <!-- Change this if you have a storage field -->
                    <td><?php echo htmlspecialchars($item['item_status']); ?></td>
                    <td><?php echo htmlspecialchars($item['supplier']); ?></td>
                    <td class="action-btns">
                        <button class="view-btn">
                            <div style="display: flex;">
                                <div class="ikons">
                                    <img src="images/view.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">View</span>
                                </div>
                            </div>
                        </button>
                        <button class="delete-btn">
                            <div style="display: flex;">
                                <div class="ikon">
                                    <img src="images/delt.png" alt="" class="ikon">
                                </div>
                                <div>
                                    <span style="padding-top: 10px; font-weight: bolder; padding-left: 10px;">Delete</span>
                                </div>
                            </div>
                        </button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
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
    // Defining arrays for button IDs and the corresponding recent content elements
    const buttons = ['bt1', 'bt2', 'bt3', 'bt4', 'bt5','bt6'];
    var r1 = document.getElementById("recent1");
    var r2 = document.getElementById("recent2");
    var r3 = document.getElementById("recent3");
    var r4 = document.getElementById("recent4");
    var r5 = document.getElementById("recent5");
    var r6 = document.getElementById("recent6");

    const recentContents = [r1, r2, r3, r4, r5,r6];

    // Adding click event listeners to each button
    buttons.forEach(function(buttonId, index) {
        const buttonElement = document.getElementById(buttonId);
        if (buttonElement) {
            buttonElement.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default anchor behavior
                
                // Hiding all recent content sections
                recentContents.forEach(function(content) {
                    content.style.display = 'none';
                });
                
                // Showing the clicked one
                recentContents[index].style.display = 'block';
            });
        }
    });
});


  </script>
    </body>  
</html>