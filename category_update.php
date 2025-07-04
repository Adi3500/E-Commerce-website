<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <?php
include('db.php');
$id=$_GET['id'];
$query = "SELECT * FROM category where id=$id";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result)){
    
    $category=$row[1];
    $dis=$row[2];
    
    }

?>
</head>
<body>
    <form action="" method="post">
    <label>category</label>
        <input type="text" name="category"  class="form-control" value="<?php echo $category ?>" /> 
        <br/>
        <label>discription</label>
        <input type="textarea" name="discription"  class="form-control" value="<?php echo $dis ?>" />
        <br />
        <button type="submit" name="update" class="btn btn-info"  value="update" >update</button>
        <?php
        if(isset($_POST['update'])){

        
        $cat=$_POST['category'];
        $discription=$_POST['discription'];
        include('db.php');
        $query="UPDATE `category` SET `category`='$cat',`discription`='$discription' WHERE id='$id'";
        $result=mysqli_query($connect,$query);
        if($result){
            echo"<script>alert('data updated')
         window.location.href='category.php'</script>";
    
        }
        else{
             echo"error";
            }
        }
        ?>
    </form>
</body>
</html>
