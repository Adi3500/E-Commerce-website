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
$size = $_GET['size'] ?? "";
$material = $_GET['material'] ?? "";
$quantity = intval($_GET['quantity'] ?? "");

$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);

$pname = $row['product'];
$pprice = $row['price'];
$del_charge = 50;
$tot_price = intval($pprice * $quantity + $del_charge);
$image = $row['image'];
$category= $row['category'];
?>

<div class="container">
    <h2>Product Buying Page</h2>

    <table>
        <tr>
            <th>Product name :</th>
            <td><?= $pname; ?></td>
            <td rowspan="6"><img src="<?= $image; ?>" width="200" alt="Product Image"></td>
        </tr>
       <?php 
       if ($category == 't shirt' || $category == 'hoodies') {
       echo" <tr>     
            <th>Size :</th>
            <td> $size</td>
        </tr>";
       }
       else{
        echo" <tr>     
            <th>Material :</th>
            <td> $material</td>
        </tr>";
       }?>
        <tr>
            <th>Product price :</th>
            <td>Rs. <?= number_format($pprice); ?>/-</td>
        </tr>
        <tr>
            <th>Quantity :</th>
            <td><?= $quantity; ?>/-</td>
        </tr>
        <tr>
            <th>Delivery charge:</th>
            <td>Rs. <?= number_format($del_charge); ?>/-</td>
        </tr>
        <tr>
            <th>Total Price :</th>
            <td>Rs. <?= number_format($tot_price); ?>/-</td>
        </tr>
        
    </table>

    <form id="payment-form" action="PAYMENT/submit.php?id=<?= $id; ?>&quantity=<?= $quantity ?>&size=<?= $size ?>&material=<?= $material ?>" method="post">
        <input type="hidden" name="product" value="<?= $pname; ?>">
        <input type="hidden" name="price" value="<?= $pprice; ?>">
        
        <?php
        require('PAYMENT/config.php');
        ?>
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="<?php echo $publishableKey ?>"
                data-amount="<?= $amt = intval($tot_price) * 100; ?>"
                data-name="AniMart"
                data-description=""
                data-image="image/zoro.jpg"
                data-currency="inr"
                data-email="Animart111@gmail.com"
        >
        </script>
    </form>
</div>
</body>
</html>
