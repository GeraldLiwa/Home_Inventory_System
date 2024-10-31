<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expense Reports</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <header>
        
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

    <section class="report-section">
        <h2>Expense Reports</h2>

        <div class="report">
            <h3>Monthly Expense Summary</h3>
            <table id="expense-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Total Expenses (MWK)</th>
                    </tr>
                </thead>
                <tbody id="category-breakdown"></tbody>
            </table>
        </div>

        <div class="report">
            <h3>Daily Average Expenditure</h3>
            <p id="daily-average" style="color:red;font-weight:bolder;font-size:20px;"></p>
        </div>

        <div class="report">
            <h3>Category Expense Chart</h3>
            <canvas id="expenseChart" width="400" height="200"></canvas>
        </div>
    </section>

    <script>
        // Fetching expense data from the separate PHP file
        async function fetchExpenseData() {
            try {
                const response = await fetch('fetch_expenses.php');
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        fetchExpenseData().then(data => {
            const { monthlySummary, dailyAverage } = data;
            const categoryBreakdownElement = document.getElementById('category-breakdown');
            const categories = [];
            const expenses = [];

            for (const category in monthlySummary) {
                const row = document.createElement('tr');
                row.innerHTML = `<td>${category}</td><td>${monthlySummary[category].toFixed(2)}</td>`;
                categoryBreakdownElement.appendChild(row);

                // Prepare data for the chart
                categories.push(category);
                expenses.push(monthlySummary[category]);
            }

            // Display daily average
            document.getElementById('daily-average').textContent = `Average Daily Expenditure: MWK ${dailyAverage.toFixed(2)}`;

            // Generate the chart
            const ctx = document.getElementById('expenseChart').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: categories,
                    datasets: [{
                        label: 'Expenses (MWK)',
                        data: expenses,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

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
