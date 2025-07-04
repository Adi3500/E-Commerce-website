<?php
    
    include('db.php');
    $o=$_GET['id'];
        
    $sql="DELETE FROM `atc` WHERE id='$o'";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo"<script>alert('item has been removed')
         window.location.href='add_to_cart.php'</script>";
    }
    else{
        echo"failed to insert".mysqli_error($con);
    }
    
?>