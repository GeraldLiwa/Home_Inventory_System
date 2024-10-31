document.addEventListener('DOMContentLoaded', function() {
          
    // Get buttons and forms by ID
    const loginButton = document.getElementById('showLoginForm');
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const signupButton = document.getElementById('showSignupForm');

    // Show login form and hide signup button
    loginButton.addEventListener('click', function() {
      loginForm.style.display = 'block'; 
      signupForm.style.display = 'none'; 
      loginButton.style.display = 'none'; 
      signupButton.style.display = 'block'; e
    });

    // Show signup form and hide login button
    signupButton.addEventListener('click', function() {
      signupForm.style.display = 'block'; 
      loginForm.style.display = 'none'; 
      signupButton.style.display = 'none'; 
      loginButton.style.display = 'block'; 
    });
    
  });

  // checking password

  function confirmPassword(event) {
    var password = document.getElementById("pword").value;
    var confirmPassword = document.getElementById("confirmp").value;
    var terms = document.getElementById("conditions");
    var errorDiv = document.getElementById("passworderro");

    // Clear previous errors
    errorDiv.innerHTML = "";

    // Check if passwords match
    if (password !== confirmPassword) {
      errorDiv.innerHTML = "<span style='color: red; font-size: 18px;'>Passwords do not match. Please try again.</span>";
      event.preventDefault();  
    }

    // Check if terms are accepted
    if (!terms.checked) {
      errorDiv.innerHTML = "<span style='color: red; font-size: 18px;'> Please agree to the terms and conditions.</span>";
      event.preventDefault();  
    }
  }

  // Attach confirmPassword function to form submission
  document.querySelector('form').addEventListener('submit', confirmPassword);


  function showSignUp() {
       document.getElementById("signin-form").style.display = "none";
       document.getElementById("signup-form").style.display = "block";
           }

 function showSignIn() {
         document.getElementById("signin-form").style.display = "block";
         document.getElementById("signup-form").style.display = "none";
            }