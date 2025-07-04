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

$id = $_GET['id'] ?? "";


$sql = "SELECT * FROM custom WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$design=$row['design'];
$size=$row['size'];
$quantity=$row['quantity'];
$color=$row['colour'];
$type=$row['type'];
$fabric=$row['fabric'];
$neck_design=$row['neck_design'];
$price=$row['price'];
?>

<div class="container">
    <h2>Product Buying Page</h2>

    <table>
        <tr>
            <th>Type :</th>
            <td><?= $type; ?></td>
            <!-- <td rowspan="6"><img src="<?= $image; ?>" width="200" alt="Product Image"></td> -->
        </tr>
       
        <tr>
            <th>Color :</th>
            <td> <?= $color; ?>/-</td>
        </tr>
        <tr>
            <th>Quantity :</th>
            <td><?= $quantity; ?>/-</td>
        </tr>
        <tr>
            <th>Fabric :</th>
            <td><?= $fabric; ?>/-</td>
        </tr>
        <tr>
            <th>Neck Design :</th>
            <td><?= $neck_design; ?>/-</td>
        </tr>
        <tr>
            <th>Size:</th>
            <td><?= $size; ?>/-</td>
        </tr>
        <tr>
            <th>Total Price :</th>
            <td>Rs. <?= number_format($price); ?>/-</td>
        </tr>
    </table>

    <form id="payment-form" action="CUSTOM_PAYMENT/submit.php?id=<?= $id; ?>" method="post">
       
        
        <?php
        require('CUSTOM_PAYMENT/config.php');
        ?>
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey ?>"
                data-amount="<?= $amt = intval($price) * 100; ?>"
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
