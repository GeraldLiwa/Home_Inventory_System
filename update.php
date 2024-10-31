<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Items</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <header style="height:5px;">
        
        <nav style="padding-top:30px;">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="additem.html">Items</a></li>
                <li><a href="additem.html">ADD ITEM</a></li>
                <li><a href="profile.php">SETTINGS</a></li>
                <li><a href="index.php">ABOUT US</a></li>
                <li><a href="report.php">REPORTS</a></li>
            </ul>
        </nav>
    </header>


</head>
<body>

    
    <script>
        document.addEventListener("DOMContentLoaded", loadItems);

function loadItems() {
    fetch("fetch_items.php")
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById("items-container");
            container.innerHTML = ""; // Clear container

            data.forEach(item => {
                const itemCard = document.createElement("div");
                itemCard.classList.add("item-card");
                itemCard.innerHTML = `
                    <h4>${item.item_name}</h4>
                    <p>Supplier: ${item.supplier}</p>
                    <p>Status: ${item.item_status}</p>
                `;
                itemCard.onclick = () => openPopup(item);
                container.appendChild(itemCard);
            });
        })
        .catch(error => console.error("Error fetching items:", error));
}

function openPopup(item) {
    document.getElementById("edit-popup").style.display = "block";
    document.getElementById("item_id").value = item.ID;
    document.getElementById("item_name").value = item.item_name;
    document.getElementById("number_items").value = item.number_items;
    document.getElementById("supplier").value = item.supplier;
    document.getElementById("item_status").value = item.item_status;
}

function closePopup() {
    document.getElementById("edit-popup").style.display = "none";
}

document.getElementById("edit-form").onsubmit = function (event) {
    event.preventDefault();
    const formData = new FormData(event.target);

    fetch("update_item.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Item updated successfully!");
            closePopup();
            loadItems(); // Refresh items
        } else {
            alert("Failed to update item.");
        }
    })
    .catch(error => console.error("Error updating item:", error));
};

    </script>
    <header>
        <h1></h1>
    </header>

    <section class="items-section">
        <h2 style="color:blue;">Manage Your Items here, please click to edit!</h2>
        <div class="items-container" id="items-container">
            <!-- Items will be dynamically loaded here -->
        </div>
    </section>

    <!-- Popup for item details and editing -->
    <div id="edit-popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <form id="edit-form">
                
                <h3 style="text-align:center;">Edit Item</h3>
                
                <label for="item_name" style="font: size 20px;font-weight:bolder;">Item Name:</label>
                <input type="text" id="item_name" name="item_name" required>

                <label for="number_items">Number of Items:</label>
                <input type="number" id="number_items" name="number_items" required>

                <label for="supplier"><span class="bb">Supplier:</span></label>
                <input type="text" id="supplier" name="supplier" required>

                <label for="item_status">Status:</label>
                <input type="text" id="item_status" name="item_status" required><br>
                


                <input type="hidden" id="item_id" name="item_id">
                <button type="submit">Save Changes</button>
                <a href="update.php" class="cancel">
                <button type="buton">cancel</button>
                </a>
            </form>
        </div>
    </div>

    <script src="manage_items.js"></script>

    <!-- footer section start -->
 <div class="footer_section" style="margin-top:180px;">
    <div class="container">
       <div class="footer_section_2">
          <div class="row">
             <div class="ttlee">
                <h2 class="useful_text">Quick Links</h2>
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
</body>
</html>
