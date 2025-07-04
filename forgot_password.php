<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Dan Aleko</title>
  <link rel="stylesheet" href="login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style="background-image: url(image/bac.jpg);
background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
  <div class="wrapper">
    <form action="" method="post" enctype="multipart/form-data">
      <h1>Create Password</h1>
      <div class="input-box">
       
        <input type="text" name="username" placeholder=" Enter Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        
        <input type="password"  name="password" placeholder="Create New Password" required>
        <i class='bx bxs-lock-alt' ></i>
      </div>
      <div class="remember-forgot">
        
      </div>
      <button type="submit" name="button_click" class="btn">Submit</button>
      <div class="register-link">
         <p>Back To Login Page <a href="login.php">login</a></p>
        <!-- <p>Dont have an seller account? <a href="seller_registration.php">seller Register</a></p> -->

      </div>
    </form>
  </div>

  <?php
include('db.php');
session_start();
if(isset($_POST['button_click'])){
  $user=$_POST['username'];
  $password=$_POST['password'];



if($connect)
{
    

    
    $cmd="SELECT * FROM `login` WHERE username='$user'";
    $res=mysqli_query($connect,$cmd);
    $row=mysqli_num_rows($res);
    if($row > 0)
    {
        
        $query="UPDATE `login` SET `password`='$password' WHERE `username`='$user'";
        $result=mysqli_query($connect,$query);
        

        if($result){
            echo"<script>
            window.location.href='login.php'</script>";
        }
      }
        else{
            $cmd="SELECT * FROM `registration` WHERE `username`='$user'";
            $res=mysqli_query($connect,$cmd);
            $row=mysqli_num_rows($res);
            if($row > 0)
            {
                
                $query="UPDATE `registration` SET `password`='$password' WHERE `username`='$user'";
                      $result=mysqli_query($connect,$query);
                      
              
                      if($result){
                          echo"<script>
                          window.location.href='login.php'</script>";
                      }
                    }
                else{
                  $cmd="SELECT * FROM `seller` WHERE sellername='$user'";
                  $res=mysqli_query($connect,$cmd);
                  $row=mysqli_num_rows($res);
                  if($row > 0)
                  {
                      $query="UPDATE `seller` SET `password`='$password' WHERE `sellername`='$user'";
                      $result=mysqli_query($connect,$query);
                      
              
                      if($result){
                          echo"<script>
                          window.location.href='login.php'</script>";
                         
                      }
                    }
                      else{
                      $cmd="SELECT * FROM `deliver_boy` WHERE delivery_username='$user'";
                  $res=mysqli_query($connect,$cmd);
                  $row=mysqli_num_rows($res);
                  if($row > 0)
                  {
                      
                    $query="UPDATE `delivery_boy` SET `password`='$password' WHERE `delivery_username`='$user'";
                    $result=mysqli_query($connect,$query);
                    
                    if($result){
                        echo"<script>
                        window.location.href='login.php'</script>";
                    }
                  }
                      
                      else{
                    echo"<span style='color:red;'>* invalid username </span>";
                      }
                }
            
        }
    }
}
}

?>
</body>
</html>