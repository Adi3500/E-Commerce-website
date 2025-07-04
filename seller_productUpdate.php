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
$query = "SELECT * FROM product where id=$id";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_array($result);
    
    $product=$row['product'];
    $price=$row['price'];
    $category=$row['category'];
    $discription=$row['discription'];
    $folder=$row['image'];
    $popular=$row['popular'];
    $quantity=$row['quantity'];

?>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <label>product</label>
        <input type="text" name="product"  class="form-control" value="<?php echo $product?>" /> 
        <br/>
        <label>price</label>
        <input type="text" name="price"  class="form-control" value="<?php echo $price?>" /> 
        <br/>
        <label>stock</label>
        <input type="number" name="stock"  class="form-control" value="<?php echo $quantity?>" /> 
        <br/>
        <label>category</label>
        <select name="category" id="category" class="form-control">
                <?php
                require('db.php');
                $q="SELECT * FROM `category`";
                $r=mysqli_query($connect,$q);
                while($row=mysqli_fetch_array($r))
                {if($row[1]===$category){
                   echo" <option value='$row[1]' selected>$row[1]</option>";
                }
                else{
                    echo" <option value='$row[1]'>$row[1]</option>";
                }
                }

                ?>
        </select>
        <br />
        <label>discription</label>
        <input type="text" name="discription"  class="form-control" value="<?php echo $discription?>" /> 
        <br/>
        <label>image</label>
        <?php 
        echo" <img src='$folder' height=40 width=70 />";
        ?>
        <input type="file" name="image" id="image" class="form-control" /><br/>
        <label>popular</label>
            <!-- <input type="radio" name="gender"  value="male">Male
            <input type="radio" name="gender"  value="female">Female <br/>  -->
            <?php
            if($popular=="yes"){
echo"<input type='radio' name='popular' value='Yes' checked/>Yes
<input type='radio' name='popular'  value='No'>No";

            }
            else{
                echo"<input type='radio' name='popular' value='Yes'/>Yes
                <input type='radio' name='popular'  value='No'  checked>No"; 
            }
            ?>
            <br />
        <button type="submit" name="update" class="btn btn-info"  value="update" >update</button>
        <?php
        if(isset($_POST['update'])){
            $image_name=$_FILES['image']['name'];
            $image_ext=$_FILES['image']['type'];
            $image_tmp=$_FILES['image']['tmp_name'];
            $image_size=$_FILES['image']['size'];
            $product=$_POST['product'];
            $price=$_POST['price'];
            $category=$_POST['category'];
            $discription=$_POST['discription'];
            $popular=$_POST['popular'];
            $stock=$_POST['stock'];
            if(is_uploaded_file($_FILES['image']['tmp_name'])){
                $folder="image/"; 
            
            if(strtolower($image_ext)=="image/jpg" || strtolower($image_ext)=="image/jpeg" || strtolower($image_ext)=="image/png")
            {
                echo"$image_tmp";
                $folder= $folder . $image_name;
            
        
        
       
        include('db.php');
        $query="UPDATE `product` SET `product`='$product',`price`='$price',`category`='$category',`discription`='$discription',`image`='$folder',`popular`='$popular',`quantity`='$stock' WHERE id='$id'";
        $result=mysqli_query($connect,$query);
        move_uploaded_file($image_tmp , $folder); 
        if($result){
            echo"<script>alert('data updated')
         window.location.href='seller_product.php'</script>";
    
        }
        else{
             echo"error";
            }
        }
            }
            else{
                include('db.php');
                $query="UPDATE `product` SET `product`='$product',`price`='$price',`category`='$category',`discription`='$discription',`image`='$folder', `popular`='$popular',`quantity`='$stock' WHERE id='$id'";
                $result=mysqli_query($connect,$query);
                move_uploaded_file($image_tmp , $folder); 
                if($result){
                    echo"<script>alert('data updated')
                 window.location.href='seller_product.php'</script>";
            
                }
                else{
                     echo"error";
                    }
            }
        }

        ?>
    </form>
</body>
</html>
