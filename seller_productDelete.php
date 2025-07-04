<?php
    
    include('db.php');
    $o=$_GET['id'];
        
    $sql="DELETE FROM `product` WHERE id='$o'";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo"<script>alert('data deleted')
         window.location.href='seller_product.php'</script>";
    }
    else{
        echo"failed to insert".mysqli_error($con);
    }
    
?>