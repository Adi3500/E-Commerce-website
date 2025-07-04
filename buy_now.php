<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
        /* Add your CSS styling here */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .product-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            max-width: 300px;
            height: 200px;
        }

        .product-description {
            margin-top: 10px;
        }

        .product-price {
            font-weight: bold;
            color: #007bff;
        }

        .button-container {
            margin-top: 20px;
        }

        .buy-button,
        .add-to-cart-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .buy-button:hover,
        .add-to-cart-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
<center>
    <form action="" method="post">
        <div class="product-container">
            <label style="color:blue"><h2>select method of payment:</h2></label>
            <select name="select" style="width:200px; padding: 5px 5px 5px 5px;  border-radius: 5px;">
                <option value="cod">Case on delevery</option>
                <option value="upi">upi</option>

            </select>
            <div class="button-container">
            <button type="buy" class="buy-button" name="buy">Order</button>
    </div>
        </div>
        <?php
        if (isset($_POST['buy'])) {
            $n = $_POST['select'];
            if ($n === 'upi') {
                echo "<lable style='color:red'>not active yet</lable>";
            }
            if ($n === 'cod') {
                include('db.php');
                $o = $_GET['id'];

                $sql = "DELETE FROM `atc` WHERE product='$o'";
                $result = mysqli_query($connect, $sql);
                if ($result) {
                    echo "<script>alert('order placed successfully')
         window.location.href='user.html#!'</script>";
                } else {
                    echo "failed to place order" . mysqli_error($con);
                }

            }

        }
        ?>
        </div>
    </form>

</center>
</body>

</html>