<?php
    
    include('db.php');
    $o=$_GET['id'];
        
    $sql="DELETE FROM `category` WHERE id='$o'";
    $result=mysqli_query($connect,$sql);
    if($result){
        echo"<script>alert('data deleted')
         window.location.href='category.php'</script>";
    }
    else{
        echo"failed to insert".mysqli_error($con);
    }
    
?>