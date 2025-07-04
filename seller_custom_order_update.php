<?php
$id=$_GET['id'];
include "db.php";
    // Collect data from the form
    $query="SELECT * FROM `custom_order` WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    $row=mysqli_fetch_array($result);
    $custom_id=$row["id"];
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
    $sql = "INSERT INTO `custom_shipping`(`custom_order_id`, `custom_id`, `sellername`, `username`, `design`, `user_contact`, `user_email`, `price`, `side`, `size`, `quantity`, `color`, `neck_design`, `fabric`, `type`, `seller_contact`, `seller_email`, `date`, `time`, `user_address`) 
            VALUES ('$id','$custom_id', '$sellername', '$username', '$design', '$user_contact', '$user_email', '$price', '$side', '$size', '$quantity', '$color', '$neck_design', '$fabric', '$type', '$seller_contact', '$seller_email', '$date', '$time','$user_address')";
    $result = mysqli_query($connect,$sql); 
    // Execute SQL statement
    if ($result) {
        $status="shipped";
        $sql="UPDATE `custom_order` SET  `status`='$status' WHERE id=$id";
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
