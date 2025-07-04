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
$query = "SELECT * FROM registration where id=$id";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_array($result)){
    $id=$row[0];
    $name=$row[1];
    $username=$row[2];
    $email=$row[3];
    $password=$row[4];
    $mobile=$row[5];
    $dob=$row[6];
    $gender=$row[7];
    $city=$row[8];

    }

?>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
   
        <label>name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name?>" />
            
        <br/> 
            <br/>
            <label>Username</label>
            <input type="text" name="username"  class="form-control" value="<?php echo $username?>" /> 
        <br/> 
            <br/>
            <label>Email</label>
            <input type="email" name="email"  class="form-control" value="<?php echo $email ?>" /> 
        <br/> 
            <br />
            <label>Password</label>
            <input type="password" name="password"  class="form-control" value="<?php echo $password ?>" /> 
        <br/> 
            <br />
            <label>Mobile No.</label>
            <input type="text" name="phone"  class="form-control" value="<?php echo $mobile ?>" /> 
        <br/> 
            <br />
            <label>Date of Birth</label>
            <input type="date" name="dob"  class="form-control" value="<?php echo $dob ?>" /> 
        <br/>
            <br />
            <label>Gender</label>
            <!-- <input type="radio" name="gender"  value="male">Male
            <input type="radio" name="gender"  value="female">Female <br/>  -->
            <?php
            if($gender=="male"){
echo"<input type='radio' name='gender' value='male' checked/>Male
<input type='radio' name='gender'  value='female'>Female";

            }
            else{
                echo"<input type='radio' name='gender' value='male'/>Male
                <input type='radio' name='gender'  value='female'  checked>Female"; 
            }
            ?>
            <br />
            <label>city</label>
            <select name="city"  class="form-control"> 
            <?php
            if($city=="surat"){
              echo"  <option value=''>'select state'</option>
                <option value='surat' selected>surat</option>
             <option value='rajkot'>rajkot</option>
             <option value='vapi'>rajkot</option></select>";
            }
            elseif($city=="vapi"){
                
                    echo"  <option value=''>'select state'</option>
                      <option value='surat' >surat</option>
                   <option value='rajkot'>rajkot</option>
                   <option value='vapi' selected >rajkot</option></select>";
            }
            else{
                echo"  <option value=''>'select state'</option>
                      <option value='surat' >surat</option>
                   <option value='rajkot'selected>rajkot</option>
                   <option value='vapi'>rajkot</option></select>";
            }
            ?>
             
            <br />
        <button type="submit" name="update" class="btn btn-info"  value="update" >update</button>
        <?php
        if(isset($_POST['update'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mobile=$_POST['phone'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
        $query="UPDATE `registration` SET `name`='$name',`username`='$username',`email`=' $email',`password`='$password',`mobile`='$mobile',`dob`='$dob',`gender`='$gender',`city`='$city' WHERE id=$id";

        $result=mysqli_query($connect,$query);

        if($result){
            echo"<script>alert('data updated')
         window.location.href='admin.html#!/userMan'</script>";
    
    
        }
        else{
             echo"<script>alert('error')
             window.location.href='admin.html#!/userMan'</script>";
        
            }
}
?>
    </form>
</body>
</html>