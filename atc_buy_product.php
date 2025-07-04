<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Buying Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
    <?php
    session_start();
    require('db.php');
    if (!isset($_SESSION['user'])) {
        echo "<center><h2 style='color:red'>Oops! you have to Log in First :
        <a href='login.php'>Login</a></h2></center>";
        exit();
    }
    ?>
</head>
<body>
<?php
include('db.php');

$username = $_SESSION['user'];

// $id = $_GET['id'] ?? "";
// $size = $_GET['size'] ?? "";
// $material = $_GET['material'] ?? "";
// $quantity = intval($_GET['quantity'] ?? "");

$sql = "SELECT SUM(t_price) AS total_price FROM `atc` WHERE username='$username'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
$totalprice = intval("$row[total_price]");
$totalPrice=$totalprice+50;
$del_charge=50;
$n=0;
$query="SELECT * FROM `atc` WHERE username='$username'";
$resul = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($resul)){

$n=$n+1;
}


?>

<div class="container">
    <h2>Product Buying Page</h2>

    <table>
        <tr>
            <th>total Product:</th>
            <td><?= intval($n); ?></td>
            
        </tr>
       
        <tr>
            <th> price of total Product  :</th>
            <td>Rs. <?= $totalprice; ?>/-</td>
        </tr>
       
        <tr>
            <th>Delivery charge:</th>
            <td>Rs. <?= $del_charge ?>/-</td>
        </tr>
        <tr>
            <th>Total Price :</th>
            <td>Rs. <?= $totalPrice; ?>/-</td>
        </tr>
    </table>

    <form id="payment-form" action="ACT_PAYMENT/submit.php" method="post">
        
        
        <?php
        require('ACT_PAYMENT/config.php');
        ?>
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey ?>"
                data-amount="<?= $amt = intval("$totalPrice") * 100; ?>"
                data-name="AniMart"
                data-description="arigato "
                data-image="image/kakashi.jpg"
                data-currency="inr"
                data-email="priyanshu935@gmail.com"
        >
        </script>
    </form>
</div>
</body>
</html>
