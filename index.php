<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Inventory Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="home.js" defer></script>
    
     
    
      



    
    <style>
        /* Popup container */
.popup {
    position: fixed; 
    z-index: 1000; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0, 0, 0); 
    background-color: rgba(0, 0, 0, 0.4); 
    display: none;
} 

/* Popup content */
.popup-content {
    background-color: #fefefe;
    margin: 15% auto; /
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The close button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

        
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="index.php"  >HOME</a></li>
                <li><a href="#" style="margin-right:30px;"></a></li>
                <li><a href="#faqs">ABOUT FAQS</a></li>
                <li><a href="#" style="margin-right:30px;"></a></li>
                <li><a href="#aboutus">CONTACT US</a></li>
                <DIv style="display: flex; padding-left: 130px;">
                <li><a href="#" class="is" style="color: #00FF00;" id="showLoginForm" >LOGIN</a></li>
                <li><a href="#" class="is" style="color: #00FF00;" id="showSignupForm">SIGN UP</a></li>
                </DIv>
            </ul>
            <div class="profile">
                <img src="images/pro icon.png" alt="Profile Image">
            </div>
        </nav>
    </header>

    <div class="main" id="showSignupForm" style="">
        
        <div>
            <div  class="regsection" id="signupForm" >
                <div>
                    <div>
                      <div class="logg">
                        <div class="im">
                          <img src="images/pro icon.png" alt="">
                        </div>
                        <div style="margin-right: 65%; padding-top: 20px; margin-left: 10px; font-size: 24px;">
                          User login
                        </div>
                        <div  class="im">
                          <a href="index.php">
                            <img src="images/caccc.png" alt="">
                          </a>
                        </div>
                        <div id="errorDiv" style="color: red;"></div> 
                      </div>
                        <form action="register.php" method="POST" enctype="multipart/form-data">
                          <div id="passworderro">
          
                          </div>
                            <span class="nme">Username</span> <span>Email</span> <br>
                            <input type="text"  name="name" id="" class="input" style="width: 44%; height: 30px; border: solid; border-radius: 7px;" required> <input type="email" name="email" id="" class="input1"><br>
              
                            <span style="padding-right: 27%;">Phone number</span>                            <span> Profile Picture</span> <br>
                            <input type="tel" name="pnumber" pattern="0[1289][0-9]{8}" id="" class="input" minlength="10" maxlength="10" required> <input type="file" name="profile_picture"  class="fl"    placeholder=""  ><br>
          
              
                            <label for="" >Address</label>
                            <input type="text" name="address" id="" class="input" style="width: 95%;  height: 27px; border: solid;" required><br>
              
                            <span class="nme">Password</span> <span>Confirm Password</span>
                            <input type="password" name="password" id="pword" style="width: 44%; height: 30px; border: solid; border-radius: 7px; margin-right: 20px;" maxlength="4" minlength="4"  required ><input type="password" name="confirmpassword" id="confirmp" style="width: 44%; height: 30px; border: solid;" style="font-size: 30px;" required><br>
                            
                            <div>
                                <input type="radio" id="condition" style="height: 20px;" required>&nbsp;&nbsp;Please accept and agree our terms and conditions <br><br>
                                <div class="b">
                                    <a href="">
                                        <input type="submit" name="" id="" value="REGISTER" class="butnn">
                                    </a>
                                    
                                </div><br>
              
                            </div>
              
              
                            
                        </form>
                    </div>
                </div>
              
              </div>
        </div>
        <div class="enter" id="loginForm" style="display: none;" id="signin-form" name="maya">
            <div style="display: flex; align-items: center; margin-bottom: 20px;">
                <div id="label">
                    <img src="pro icon.png" alt="Icon">
                </div>
                <div>
                    <p style="font-weight: bold;">User Login</p>
                </div>
                <div style="text-align: left;padding-left: 210px;">
                    <a href="index.php">
                        <img src="images/caccc.png" alt="" style="height: 60px; width: 50px;">
                    </a>
                </div>
            </div>
            <div>
                <h2>WELCOME</h2>
            </div>
            
            <form  action="login.php" method="POST">
                <label for="username">Username/Email</label>
                <input type="text" id="username" name="username" placeholder="Enter your username or email" required>
    
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
    
                <input type="submit" value="LOGIN" id="login">
            </form>
            <div class="testing">
                <a href="#">Forgot Password?</a>
                <a href="#" id="showSignupForm">Sign up?</a>
            </div>
        </div>
    </div>
    <!-- Popup for error messages -->
    <div id="errorPopup" class="popup" style="display: none;">
    <div class="popup-content">
        <span class="close" id="closePopup">&times;</span>
        <p id="popupMessage"></p>
    </div>
     </div>

    <div style="display: none;" id="signin-form" name="signin">
        <div>
            <div>
                <form action="register.php">
                    <label for="">Name</label> <label for="">Email</label><br>
                    <input type="text" name="" id=""> <input type="email" name="" id=""><br><br>

                    <label for="">Phone number</label> <label for="">Picture</label><br>
                    <input type="number" name="" id=""> <input type="file" name="" id=""><br><br>

                    Address <br>
                    <input type="text" name="" id=""><br><br>

                    <label for="">Password</label> <label for="">Confirm Password</label><br>
                    <input type="password" name="" id="pword"> <input type="password" name="" id="confirmp"><br><br>

                    <div>
                        <input type="radio" id="condition">&nbsp;&nbsp;Please accept and agree our terms and conditions <br><br>
                        <div>
                            <a href="" id="REGISTER" class="subscribe_bt" >REGISTER</a>
                           
                        </div>

                    </div>


                    
                </form>
            </div>
        </div>

    </div>
    
    
        <!-- service section start -->
      
      <div class="service_section layout_padding" >
        <div class="container-fluid" >
           <div class="rw">
              <div  style="text-align:center;">
                 <h1>Our Services</h1>
              </div>
           </div>
           <div class="service_section_2">
              <div class="row">
                 <div class="mainbox">
                    <div class="service_box">
                       <div class="building_icon"><img src="images/secure icon.png" ></div>
                       <h4 class="residential_text">Easy and Secure Access</h4>
                       <p class="service_text"> Families can access their inventory system from any device, ensuring that important information is always at their fingertips. This flexibility allows users to update their inventory in real-time, whether at home or on the go. The cloud-based storage not only provides convenience but also ensures that data is securely backed up. With robust security measures in place, families can trust that their sensitive information remains protected from loss or unauthorized access.</p>
                    </div>
                    <div class="readmore_bt"><a href="#">Read More</a></div>
                 </div>
                 <div class="mainbox">
                    <div class="service_box">
                       <div class="building_icon"><img src="images/value2.png"></div>
                       <h4 class="residential_text">Value Tracking for Insurance</h4>
                       <p class="service_text">This feature calculates and maintains an accurate value of all household items, which is crucial for insurance coverage. Families can quickly generate reports detailing the total worth of their belongings in case of loss or theft. This service simplifies the insurance claims process by providing comprehensive documentation of items and their values. It ensures that families are adequately covered and can recover losses effectively in relation to devaluation. <br></p>
                    </div>
                    <div class="readmore_bt"><a href="#">Read More</a></div>
                 </div>
                 <div class="mainbox">
                    <div class="service_box">
                       <div class="building_icon"><img src="images/expe icon.png"></div>
                       <h4 class="residential_text"> Expense Management</h4>
                       <p class="service_text"> This feature calculates and maintains an accurate value of all household items, which is crucial for insurance coverage. Families can quickly generate reports detailing the total worth of their belongings in case of loss or theft. This service simplifies the insurance claims process by providing comprehensive documentation of items and their values. It ensures that families are adequately covered and can recover losses effectively , Thereby serving the family from unusual expenses.</p>
                    </div>
                    <div class="readmore_bt"><a href="#">Read More</a></div>
                 </div>
                 <div class="mainbox">
                    <div class="service_box">
                       <div class="building_icon"><img src="images/exper2.png"></div>
                       <h4 class="residential_text">Warranty and Expiry Alerts</h4>
                       <p class="service_text">This service allows families to set reminders for when warranties on their items are nearing expiration. It helps ensure that they don’t miss out on claiming warranties or making necessary repairs before coverage ends. Additionally, reminders for maintenance schedules can help prolong the lifespan of appliances and equipment. Overall, this feature minimizes unexpected costs by encouraging timely action especial in the part of maintance and rotten</p>
                    </div>
                    <div class="readmore_bt"><a href="#">Read More</a></div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- service section end -->
     
     <br>
     <br>
     <br><br><br><br>
     <div> <br><br>
        <div style=" height:  auto; margin-top: 650px; ">
            <div  class="mpro">
                <div class="property">
                    <div class="num">
                        <p>1000+</p>
                    </div>
                    <div class="numTxt">
                        <p>Active Users</p>
                    </div>
                </div>
                <div class="property">
                    <div class="num">
                        <p>800+</p>
                    </div>
                    <div class="numTxt">
                        <p>Properties Managed</p>
                    </div>
                </div>
                <div class="property">
                    <div class="num">
                        <p>500+</p>
                    </div>
                    <div class="numTxt">
                        <p>Tasks Completed</p>
                    </div>
                </div>
                <div class="property">
                    <div class="num">
                        <p>20+</p>
                    </div>
                    <div class="numTxt">
                        <p>Available Services</p>
                    </div>
                </div>
            </div>
         </div>
         <div>

        </div>
        <!-- FAQS -->
<div class="faq-section" style=" background-color: #003366; border-radius: 20px; margin-top: 20px;" id="faqs" name="faqs">
   <div class="faq-left">
       <div class="faq-container"> 
           <div class="faq-item">
               <div class="faq-question"    onclick="toggleFAQ(this)">
                   Q: What is a home inventory management system? 
                   <span class="faq-icon">▼</span>
               </div>
               <div class="faq-answer">
                A home inventory management system is a digital tool that helps you track and organize your household items, providing detailed information such as purchase date, value, and condition. It simplifies managing your belongings, ensuring you know what you have and helping with insurance claims and budgeting.
               </div>
           </div>

           <div class="faq-item">
               <div class="faq-question" onclick="toggleFAQ(this)">
                   Q:How can this system benefit me? 
                   <span class="faq-icon">▼</span>
               </div>
               <div class="faq-answer">
                   A:This system offers peace of mind by keeping a detailed record of your possessions, making it easier to file insurance claims in case of loss or damage. It also helps you stay organized, prevent clutter, and manage your household expenses more effectively.
               </div>
           </div>

           <div class="faq-item">
               <div class="faq-question" onclick="toggleFAQ(this)">
                   Q: Is my data secure?
                   <span class="faq-icon">▼</span>
               </div>
               <div class="faq-answer">
                   A: Yes, your data is securely stored in the cloud with robust encryption and backup measures in place. This ensures that your information is protected from unauthorized access and is safe from loss due to device failures.
               </div>
           </div>
           <div class="faq-item">
            <div class="faq-question" onclick="toggleFAQ(this)">
                Q: Can I access my inventory from anywhere?
                <span class="faq-icon">▼</span>
            </div>
            <div class="faq-answer">
                A: Absolutely! The cloud-based nature of the system allows you to access your inventory from any device—whether you’re at home, work, or on the go. You can easily update your records in real time whenever needed.
            </div>
        </div>

           <div class="faq-item">
               <div class="faq-question" onclick="toggleFAQ(this)">
                   Q: Can this system help with insurance claims?
                   <span class="faq-icon">▼</span>
               </div>
               <div class="faq-answer">
                   A: Yes, the system can generate comprehensive reports detailing the value and condition of your items, making the claims process much smoother. In the event of theft, loss, or damage, you’ll have all the necessary documentation readily available.
               </div>
           </div>
       </div>
   </div>

   <div class="faq-right">
       <h4 style="font-size: 30px; font-style: bold;"></h4>
       <h1 style=" color: white;">Common Frequently Asked Questions?</h1>
       <p class="into" style="font-size: 20px; color: #f9b116;">Welcome to our FAQs section! Here, we’ve answered some of the most common questions to help make your  inventory manangement experience as smooth as possible. If you need more details, feel free to explore the questions below or reach out to our customer service team for further assistance.

       </p>
       <button class="cta-button"><a href="#" style="text-decoration: none;">Have Any Questions</a></button>
   </div>
</div>

<script>
   function toggleFAQ(faqElement) {
       const answer = faqElement.nextElementSibling;
       const icon = faqElement.querySelector(".faq-icon");

       if (answer.style.maxHeight) {
           answer.style.maxHeight = null;
           icon.textContent = "▼";
       } else {
           answer.style.maxHeight = answer.scrollHeight + "px";
           icon.textContent = "▲";
       }
   }
</script>
<br><br><br>

 <!-- FAQS End -->
     
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
                      <li><a href="index.php"></a></li>
                      <li><a href="#faqs">About faqs</a></li>
                      
                      <li><a href="#aboutus">Contact Us</a></li>
                      
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
             <div class="ttle"  id="aboutus">
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

 <!-- footer section end -->
     
    </div>

    
</body>
</html>
