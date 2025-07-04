<?php
    
    include('db.php');
    $o=$_GET['id'];
        
    $sql="DELETE FROM `delivery_boy` WHERE id='$o'";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo"<script>alert('data deleted')
         window.location.href='admin.html#!/userMan'</script>";
    }
    else{
        echo"failed to insert".mysqli_error($con);
    }
    
?>