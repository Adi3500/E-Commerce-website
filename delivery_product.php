<?php
$id=$_GET['id'];
include "db.php";
session_start();
$D_username=$_SESSION['username'];
    // Collect data from the form
    $query="SELECT * FROM `shipping_order` WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
    $order_id=$row['order_id'];
    $product_id = $row['product_id'];
    $sellername = $row['sellername'];
    $username = $row['username'];
    $product = $row['product'];
    $description = $row['discription'];
    $category = $row['category'];
    $price = $row['price'];
    $image = $row['image'];
    if($category == "t shirt" || $category == "hoodies"){
    $size = $row['size'];
    $material="---";
    }else{
        $material = $row['material'];
        $size="---";
    }
    $quantity = $row['quantity'];
    $user_contact = $row['user_contact'];
    $user_address = $row['user_address'];
    $seller_contact = $row['seller_contact'];
    $date = $row['date'];
    $time = $row['time'];
    
    $t_price = $row['t_price'];
    $del_price = $row['del_price'];

    
    $sql = "INSERT INTO `delivery`(`shipping_id`, `order_id`, `product_id`, `delivery_username`, `sellername`, `username`, `product`, `discription`, `category`, `price`, `image`, `size`, `quantity`, `user_contact`, `user_address`, `seller_contact`, `date`, `time`, `material`, `t_price`, `del_price`) 
            VALUES ('$id','$order_id','$product_id','$D_username','$sellername', '$username', '$product', '$description', '$category', '$price', '$image', '$size', '$quantity', '$user_contact', '$user_address', '$seller_contact', '$date', '$time', '$material', '$t_price', '$del_price')";
    $result = mysqli_query($connect,$sql); 
    // Execute SQL statement
    if ($result) {
        $status="out for delivery";
        $sql="UPDATE `order` SET  `status`='$status' WHERE id=$order_id";
        $result=mysqli_query($connect,$sql);
        $query="DELETE FROM `shipping_order` WHERE id='$id'";
        $resul=mysqli_query($connect,$query);
        if($resul){
            echo"<script>alert('taking ORDER for delivery')
             window.location.href='delivery_dashboard.php'</script>";
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
