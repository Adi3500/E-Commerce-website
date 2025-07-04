<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
$seller=$_SESSION['username'];
// Fetching total sales per category
$totalSalesByCategory = [];
$sql = "SELECT category, SUM(quantity) AS total_sales FROM delivered_product where sellername='$seller' GROUP BY category";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalSalesByCategory[$row['category']] = $row['total_sales'];
    }
}

// Close database connection
$connect->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Category Sales Chart</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Category Sales Chart</h1>
    <canvas id="salesChart" width="800" height="400"></canvas>

    <script>
        // Processed data for Chart.js
        var totalSalesByCategory = <?php echo json_encode($totalSalesByCategory); ?>;
        var categoryNames = Object.keys(totalSalesByCategory);
        var totalSales = Object.values(totalSalesByCategory);

        // Create a bar chart
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: categoryNames,
                datasets: [{
                    label: 'Total Sales',
                    data: totalSales,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
