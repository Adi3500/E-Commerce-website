<?php
$id=$_GET['id'];
include "db.php";
session_start();
$D_username=$_SESSION['username'];
    // Collect data from the form
    $query="SELECT * FROM `delivery` WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
    $order_id=$row['order_id'];
    $shipping_id=$row['shipping_id'];
    $product_id = $row['product_id'];
    $sellername = $row['sellername'];
    $username = $row['username'];
    $product = $row['product'];
    $description = $row['discription'];
    $category = $row['category'];
    $price = $row['price'];
    $image = $row['image'];
    $size = $row['size'];
    $quantity = $row['quantity'];
    $user_contact = $row['user_contact'];
    $user_address = $row['user_address'];
    $seller_contact = $row['seller_contact'];
    $date = $row['date'];
    $time = $row['time'];
    $material = $row['material'];
    $t_price = $row['t_price'];
    $del_price = $row['del_price'];

    
    $sql = "INSERT INTO `Delivered_product`(`delivery_id`,`shipping_id`,`order_id`, `product_id`,`deliveryBoy_username`, `sellername`, `username`, `product`, `discription`, `category`, `price`, `image`, `size`, `quantity`, `user_contact`, `user_address`, `seller_contact`, `date`, `time`, `material`, `t_price`, `del_price`) 
            VALUES ('$id','$shipping_id','$order_id','$product_id','$D_username', '$sellername', '$username', '$product', '$description', '$category', '$price', '$image', '$size', '$quantity', '$user_contact', '$user_address', '$seller_contact', '$date', '$time', '$material', '$t_price', '$del_price')";
    $result = mysqli_query($connect,$sql); 
    // Execute SQL statement
    if ($result) {
        
        $sqll="DELETE FROM `order` WHERE id='$order_id'";
        $results=mysqli_query($connect,$sql);
        $sql="DELETE FROM `delivery` WHERE id='$id'";
        $result=mysqli_query($connect,$sql);
        if($result){
            echo"<script>alert('product delivered')
             window.location.href='your_delivery.php'</script>";
        }
        else{
            echo"failed to insert".mysqli_error($connect);
        }

    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }


// Close the connection
$connect->close();
?>
