<?php
$id=$_GET['id'];
include "db.php";
    // Collect data from the form
    $query="SELECT * FROM `order` WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
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

    
    $sql = "INSERT INTO `shipping_order`(`order_id`, `product_id`, `sellername`, `username`, `product`, `discription`, `category`, `price`, `image`, `size`, `quantity`, `user_contact`, `user_address`, `seller_contact`, `date`, `time`, `material`, `t_price`, `del_price`) 
            VALUES ('$id','$product_id', '$sellername', '$username', '$product', '$description', '$category', '$price', '$image', '$size', '$quantity', '$user_contact', '$user_address', '$seller_contact', '$date', '$time', '$material', '$t_price', '$del_price')";
    $result = mysqli_query($connect,$sql); 
    // Execute SQL statement
    if ($result) {
        $status="shipped";
        $sql="UPDATE `order` SET  `status`='$status' WHERE id=$id";
        $result=mysqli_query($connect,$sql);
        if($result){
            echo"<script>alert('order shipped successfully')
             window.location.href='seller_order_product.php'</script>";
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
