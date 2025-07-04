<?php
    session_start();
    echo"entered";
if(isset($_SESSION['id'])){
    echo"entered";

    include('db.php');
        $id=$_SESSION['id'];
        
        $category=$_SESSION['category'];
        $dis=$_SESSION['dis'];
        $query="INSERT INTO `category`(`id`, `category`, `discription`) VALUES ('$id','$category','$dis')";
        $result=mysqli_query($connect,$query);
        if($result){
            echo"<script>alert('data updated')
         window.location.href='admin.html#!/category'</script>";
    
    
        }
        else{
             echo"<script>alert('error')
             window.location.href='admin.html#!/category'</script>";
        
            }
}
        ?>