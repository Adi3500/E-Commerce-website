<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .product-image {
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        require('db.php');
        if (!isset($_SESSION['username'])) {
            echo "<center><h2 style='color:red'>Oops! you have to Log in First: <a href='login.php'>Login</a></h2></center>";
            exit();
        }
        ?>
        <form action="" method="post">
            <?php
            $id=$_GET['id'];
            $seller=$_SESSION['username'];
            $q="SELECT * FROM `seller` WHERE sellername='$seller'";
            $r = mysqli_query($connect, $q);
            $ro = mysqli_fetch_array($r);
            $seller_contact= $ro[5];
            $seller_email= $ro['email'];
            $sql="SELECT * FROM `custom` WHERE id=$id ";
            $result=mysqli_query($connect,$sql);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<label>Design:</label><br>";
                    echo "<img src='" . $row["design"]. "' alt='Custom Image' class='product-image'><br>";
                    echo "<label>Username: " . $row["username"]. "</label><br>";
                    echo "<label>Side: " . $row["side"]. "</label><br>";
                    echo "<label>Size: " . $row["size"]. "</label><br>";
                    echo "<label>Color: " . $row["colour"]. "</label><br>";
                    echo "<label>Type: " . $row["type"]. "</label><br>";
                    echo "<label>fabric: " . $row["fabric"]. "</label><br>";
                    echo "<label>Neck Design: " . $row["neck_design"]. "</label><br>";
                    echo "<label>quantity: " . $row["quantity"]. "</label><br>";

                }
            } else {
                echo "0 results";
            }
            ?>
            <label>Enter price of product:</label>
            <input type="text" name="price" class="form-control" required />
            <br />
            <button type="submit" name="btnInsert" class="btn">Confirm</button>
        </form>
        <?php
        if(isset($_POST['btnInsert'])){
            $price=$_POST['price'];
            $status="confirm";
            $sellername=$_SESSION['username'];
            $query="UPDATE `custom` SET `seller_name`='$sellername',`price`='$price',`status`='$status',`seller_contact`='$seller_contact',`seller_email`='$seller_email' WHERE  id='$id'";
            $result=mysqli_query($connect,$query);
            if($result){
                echo "<script>alert('Product confirmed'); window.location.href='seller_custom.php'</script>";
            } else {
                echo "Error";
            }
        }
        ?>
    </div>
</body>
</html>
