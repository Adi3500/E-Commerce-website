<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form | Dan Aleko</title>
  <!-- <link rel="stylesheet" href="login.css"> -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css" />  

  <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      
      crossorigin="anonymous"
    ></script>
  
    <style>
      .input-field textarea {
  background-color: #f0f0f0; /* Set the background color */
}
.input-field textarea::placeholder {
   /* Center-align the placeholder text */
  line-height: 30px; /* Match the height of the textarea */
  padding-top: 12px; /* Adjust the padding to center vertically */
}

 /* Apply CSS to style the form */
 /* Apply CSS to style the form */
.sign-up-form {
    max-width: 400px;
    max-height: 700px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow-y: auto; /* Add vertical scrollbar */
    -webkit-overflow-scrolling: touch; /* Enable smooth scrolling on iOS devices */
}

/* Add styling for the scrollbar */
.sign-up-form::-webkit-scrollbar {
    width: 10px; /* Set the width of the scrollbar */
}

.sign-up-form::-webkit-scrollbar-track {
    background: #f1f1f1; /* Set the background color of the scrollbar track */
}

.sign-up-form::-webkit-scrollbar-thumb {
    background: #888; /* Set the color of the scrollbar thumb */
    border-radius: 5px; /* Add border-radius to the scrollbar thumb */
}

.sign-up-form::-webkit-scrollbar-thumb:hover {
    background: #555; /* Set the color of the scrollbar thumb on hover */
}
/* Apply CSS to style the circular image */
.circular-image {
    border-radius: 50%; /* Make the border radius 50% to create a circle */
    width: 150px; /* Set the width of the image */
    height: 150px; /* Set the height of the image */
    object-fit: cover; /* Ensure the image covers the entire container */
}


      
    </style>
</head>
<body>
<div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="" method="post" enctype="multipart/form-data" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  name="password" placeholder="Password" required />
            </div>
            <p><a href="forgot_password.php">Forgot Password</a></p>
            <input type="submit" name="button_click" class="btn" />

            <?php
include('db.php');
session_start();
if(isset($_POST['button_click'])){
  $user=$_POST['username'];
  $password=$_POST['password'];



if($connect)
{
    

    
    $cmd="SELECT * FROM `login` WHERE username='$user' AND password='$password' ";
    $res=mysqli_query($connect,$cmd);
    if($res)
    {
        
        $row=mysqli_num_rows($res);
        

        if($row> 0){
            echo"<script>
            window.location.href='dashboard.php'</script></script>";
            $_SESSION['username']=$user;
        }
        else{
            $cmd="SELECT * FROM `registration` WHERE username='$user' AND password='$password' ";
            $res=mysqli_query($connect,$cmd);
            if($res)
            {
                
                $row=mysqli_num_rows($res);
                
        
                if($row> 0){
                    echo"<script>
                    window.location.href='user_home.php'</script>";
                    $_SESSION['user']=$user;
                    
                }
                else{
                  $cmd="SELECT * FROM `seller` WHERE sellername='$user' AND password='$password' ";
                  $res=mysqli_query($connect,$cmd);
                  if($res)
                  {
                      
                      $row=mysqli_num_rows($res);
                      
              
                      if($row> 0){
                          echo"<script>
                          window.location.href='seller_dasboard.php'</script>";
                          $_SESSION['username']=$user;
                      }
                      else{
                      $cmd="SELECT * FROM `deliver_boy` WHERE delivery_username='$user' AND password='$password' ";
                  $res=mysqli_query($connect,$cmd);
                  if($res)
                  {
                      
                      $row=mysqli_num_rows($res);
                      
              
                      if($row> 0){
                          echo"<script>
                          window.location.href='delivery_dashboard.php'</script>";
                          $_SESSION['username']=$user;
                      }
                      
                      else{
                    echo"<p style='color:red'>*invalid username or password</p>";
                      }
                }
            
        }
    }
}
}
}
}
}
}
?>
            
            <div class="register-link">
               <center><p>Don't have an delivery boy account? <a href="delivery_boy_registration.php">Delivery boy Register</a></p></center> 
              <p>Don't have a seller account? <a href="seller_registration.php">Seller Register</a></p>
              <center><p> <a href="skip.php">Skip>>></a></p></center>

            </div>
          </form>

          
          
          <form action="#" method="post" class="sign-up-form"  onsubmit="return validateForm()" style="  margin: 0 auto; padding: 20px; border: 1px solid #ccc;
        border-radius: 5px; ">
            

            <br><br> <br><br><br><br>
            <div class="">
            <div class="login-container">
                    <center><img id="preview" src="image/default.jpg" alt="Uploaded Image" name="img" height="100px"
                        width="150px" class="circular-image" />
              <input type="file" name="image" id="image" class="form-control"  onchange="previewImage(event)" />
              </center>
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="name" placeholder="Name" required pattern="[A-Za-z ]+" title="Only letters and spaces are allowed"/>
            </div>

            <div class="input-field">
              <i class="far fa-user"></i>
              <input type="text" name="username" class="form-control" placeholder="Username" required pattern="[A-Za-z0-9]+" title="Only letters and numbers are allowed"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" class="form-control" placeholder="Email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="input-field">
              <i class="fas fa-mobile"></i>
              <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No." required pattern="[0-9]{10}" title="Please enter 10 digit mobile number"  />
            </div>
            <div class="input-field">
              <i class="fas fa-address-book"></i>

              <textarea name="address" class="form-control" placeholder="Address" required style="height: 55px; width: 321px; border-radius: 30px; border: none;"></textarea>
            </div>
            <div class="input-field">
              <i class="far fa-calendar"></i>

              <input type="date" name="dob" class="form-control" required />
            </div>
            <div class="" > 
                    <select name="gender" class="form-control" required style="height: 40px; width: 376px; border-radius: 20px;">
                        <option value="" selected>Select Gender</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select><br><br>
            </div>
            <div class="">
              <select name="city" class="form-control" style="height: 40px; width: 376px; border-radius: 20px;" required>
                <option value="" selected>Select State</option>
                <option value="surat">surat</option>
                <option value="rajkot">rajkot</option>
                <option value="vapi">vapi</option>
              </select>
            </div>
           <center> <input type="submit" class="btn" value="Sign up" name="btnInsert" /></center>
            
            <?php

                    if (isset($_POST['btnInsert'])) {
                        
                        $username = $_POST['username'];
                        include('db.php');
                        $c="SELECT * FROM `registration` WHERE username='$username'";
                        $r = mysqli_query($connect, $c);
                        if (mysqli_num_rows($r) == 0) {
                        $c="SELECT * FROM `seller` WHERE sellername='$username'";
                            $r = mysqli_query($connect, $c);
                            if (mysqli_num_rows($r) == 0) {
                        $c="SELECT * FROM `login` WHERE username='$username'";
                        $r = mysqli_query($connect, $c);
                            if (mysqli_num_rows($r) == 0) {
                        

                        if (isset($_FILES['image'])) {

                            $image_name = $_FILES['image']['name'];
                            $image_ext = $_FILES['image']['type'];
                            $image_tmp = $_FILES['image']['tmp_name'];
                            $image_size = $_FILES['image']['size'];
                            $folder = "image/";
                            if (strtolower($image_ext) == "image/jpg" || strtolower($image_ext) == "image/jpeg" || strtolower($image_ext) == "image/png") {
                                $folder = $folder . $image_name;
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                $mobile = $_POST['mobile_no'];
                                $dob = $_POST['dob'];
                                $gender = $_POST['gender'];
                                $city = $_POST['city'];
                                $address=$_POST['address'];
                                move_uploaded_file($image_tmp, $folder);

                                $query = "INSERT INTO `registration`( `name`, `username`, `email`, `password`, `mobile`, `dob`, `gender`, `city`,`image`,`address`) VALUES ('$name','$username','$email','$password','$mobile','$dob','$gender','$city','$folder','$address')";

                                $result = mysqli_query($connect, $query);

                                if ($result) {
                                    echo "<script>alert('data updated')
         window.location.href='login.php'</script>";


                                } else {
                                    echo "<script>alert('error')
             window.location.href='login.php'</script>";

                                }
                            }
                        } else {
                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $image = "image/default.jpg";
                            $mobile = $_POST['mobile_no'];
                            $dob = $_POST['dob'];
                            $gender = $_POST['gender'];
                            $city = $_POST['city'];
                            $address=$_POST['address'];
                            $query = "INSERT INTO `registration`( `name`, `username`, `email`, `password`, `mobile`, `dob`, `gender`, `city`,`image`,`address`) VALUES ('$name','$username','$email','$password','$mobile','$dob','$gender','$city','$image','$address')";
                            $result = mysqli_query($connect, $query);

                            if ($result) {
                                echo "<script>
         window.location.href='login.php'</script>";


                            } else {
                                echo "<script>alert('error')
             window.location.href='login.php'</script>";

                            }
                        }
                    }
                    else{
                        echo"<label style='color:red;'>* this username is all ready taken</label></br>";
                    }
                }
                else{
                    echo"<label style='color:red;'>* this username is all ready taken</label></br>";
                }
            }
            else{
                echo"<label style='color:red;'>* this username is all ready taken</label></br>";
            }
        }
        
                    ?>
            
          </form>
          <script>
    function validateForm() {
        var name = document.getElementById("name").value;
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var mobile_no = document.getElementById("mobile_no").value;
        var address = document.getElementById("address").value;
        var dob = document.getElementById("dob").value;
        var gender = document.getElementById("gender").value;
        var city = document.getElementById("city").value;

        if (name == "" || username == "" || email == "" || password == "" || mobile_no == "" || address == "" || dob == "" || gender == "" || city == "") {
            alert("All fields must be filled out");
            return false;
        }
        return true;
    }
</script>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              "Join Our Community: Register Today for Exclusive Access and Benefits!"






            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
            
          </div>
          <img src="image/log.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              
            </p>
            <button type="submit" name="btnInsert" class="btn transparent"  value="ADD" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="image/log2.png" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
    <script>
      function previewImage(event) {
          var reader = new FileReader();
          reader.onload = function () {
              var output = document.getElementById('preview');
              output.src = reader.result;
              // output.style.display = 'block';
          }
          reader.readAsDataURL(event.target.files[0]);
      }
  </script>
</body>
</html>