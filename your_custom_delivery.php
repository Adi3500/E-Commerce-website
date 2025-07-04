<?php
$id=$_GET['id'];
include "db.php";
    session_start();
    $D_user=$_SESSION['username'];
    $query="SELECT * FROM `custom_delivery` WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
    $shipping_id=$row['shipping_id'];
    $custom_id=$row["custom_id"];
    $custom_order_id=$row["custom_order_id"];
    $type=$row["type"];
    $side=$row["side"];
    $size=$row['size'];
    $color=$row["color"];
    $price=$row["price"];
    $quantity=$row["quantity"];
    $username=$row["username"];
    $user_contact=$row["user_contact"];
    $user_email=$row["user_email"];
    $user_address=$row["user_address"];
    $sellername=$row["sellername"];
    $seller_contact=$row["seller_contact"];
    $seller_email=$row["seller_email"];
    $fabric=$row["fabric"];
    $neck_design=$row['neck_design'];
    $design=$row["design"];
    $date=$row["date"];
    $time=$row["time"];
    $sql = "INSERT INTO `custom_delivered`(`custom_delivery_id`, `shipping_id`, `custom_order_id`, `custom_id`, `deliveryBoy_username`, `sellername`, `username`, `design`, `user_contact`, `user_email`, `price`, `side`, `size`, `quantity`, `color`, `neck_design`, `fabric`, `type`, `seller_contact`, `seller_email`, `date`, `time`, `user_address`)  
            VALUES ('$id','$shipping_id', '$custom_order_id','$custom_id','$D_user','$sellername', '$username', '$design', '$user_contact', '$user_email', '$price', '$side', '$size', '$quantity', '$color', '$neck_design', '$fabric', '$type', '$seller_contact', '$seller_email', '$date', '$time','$user_address')";
    $result = mysqli_query($connect,$sql); 
    // Execute SQL statement
    if ($result) {
        $status="out for delivery";
        $sql="DELETE FROM `custom_order` WHERE id='$custom_order_id";
        $result=mysqli_query($connect,$sql);
        $query="DELETE FROM `custom_delivery` WHERE id='$id'";
        $resul=mysqli_query($connect,$query);
        if($resul){
            echo"<script>alert('delivered successfully')
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
