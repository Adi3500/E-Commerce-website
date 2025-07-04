<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <link rel="stylesheet" href="userhome.css" >
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

 
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.051);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 500px;
            border-radius: 5px;
        }
        .form-label {
            font-weight: 500;
            color: #374151;
        }
        .form-input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            outline: none;
        }
        .submit-btn {
            /* width: 100%; */
            padding: 10px;
            margin-top: 15px;
            background-color: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
        }
    </style>
    <?php
    session_start();
if(!isset($_SESSION['user']))
{
    echo " <center><h1 class='text-5xl font-extrabold dark:text-red-500 py-72'>Oops! you have to Logging First :
    <a href='login1.php'><span class='text-sky-600 underline underline-offset-8'>login</span></a></h1></center>";
    //header('Location: login.php');
    exit();

}
include('db.php');
$name=$_SESSION['user'];
$query = "SELECT * FROM registration where username='$name'";
$res=mysqli_query($connect,$query);
$num=mysqli_num_rows($res);
if($num>0)
{
while($row=mysqli_fetch_array($res)){
    $id=$row[0];
    $name=$row[1];
    $username=$row[2];
    $email=$row[3];
    $password=$row[4];
    $mobile=$row[5];
    $dob=$row[6];
    $gender=$row[7];
    $city=$row[8];
    $image=$row['image'];

    }
}
else{
    echo"data not found";
}
?>
</head>
<body class="font-[Poppins]  h-full w-full bg-slate-300">

<header class="bg-white">
        <div class="  w-full drop-shadow-xl" >
        <nav class="flex justify-between items-center w-full px-16 py-0  mx-auto   ">
            <div>
                <!-- <img class="w-16 cursor-pointer" src="image/anymartlogo.png" alt="..."> -->
                <h2 class="w-16 py-4 cursor-pointer text-2xl font-bold">AnyMart</h2>
            </div>
            <div
                class="nav-links duration-500 md:static absolute  text-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950 " href="user_home.php">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950 " href="add_to_cart.php">Add to cart</a>
                    </li>
                    <li>
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950" href="about_us.php">About Us</a>
                    </li>
                    <li>
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950" href="#">Contact Us</a>
                    </li>
                    <li>
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950" href="custom.php">Custom Product</a>
                    </li>                   
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <!-- <a href="user_profile.php"><button class="text-white px-5 py-2 rounded-full hover:bg-[#87acec] bg-[#1da1f2] text-white font-bold"></button></a> -->
                <!-- <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon> -->

                <!-- temp     -->
                    

                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"><?php if(isset($_SESSION['user'])){$user=$_SESSION["user"]; echo"$user";}else{ echo"Sign In";}?> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="user_profile.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">User Profile</a>
      </li>
      <li>
        <a href="orders.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Order</a>
      </li>
      <li>
        <a href="user_custom_detail.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Custom Product Detail</a>
      </li>
      <li>
        <a href="user_custom_order.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Custom Orders</a>
      </li>
      <li>
        <a href="feedback.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Feedback</a>
      </li>
      <li>
        <a href="login.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Log Out</a>
      </li>
    </ul>
</div>

                <!-- temp -->
            </div>
        </div>
        
        
    </header>


    <br>
    <div id="user-body">
    <form action="user_profile.php" method="post">
        <center>
    <div class="login-container">
</br>



<!-- temp -->

<div class="bg-white max-w-2xl shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
    <h2 class="text-2xl font-bold mb-4">My Profile</h2>
                
    
    <div class="flex justify-center items-center ">
    <div class="rounded-full overflow-hidden border-4 border-white">
            <img class="w-32 h-32 object-cover" src="<?php echo $image?>" alt="Profile Image">
        </div> 
        </div><br>  
    
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-input" value="<?php echo $name?>" />
                </div>
                <!-- Add similar blocks for other input fields -->
                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" value="<?php echo $username?>" />
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" value="<?php echo $email?>" />
                </div>
                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" value="<?php echo $password?>" />
                </div>
                <!-- Mobile -->
                <div class="mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" id="mobile" name="mobile" class="form-input" value="<?php echo $mobile?>" />
                </div>
                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-input" value="<?php echo $dob?>" />
                </div>
            </div>
            <!-- Gender -->
            <div class="mb-4">
                    <label class="form-label">Gender</label>
                    <div>

                    <div>
                        

                <?php
            if($gender=="male"){
echo"<input type='radio' name='gender' value='male' checked/>&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='gender'  value='female'>Female";

            }
            else{
                echo"<input type='radio' name='gender' value='male'/> Male
                <input type='radio' name='gender'  value='female'  checked>Female"; 
            }
            ?>

                    
                </div>
            </div>
            
            <!-- City -->
        <div class="mb-4">
                    <label for="city" class="form-label">City</label>

                <select name="city"  class="form-input mb-4"> 
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

                    
                
        </div>

            
                <button type="submit" name="update" class=" submit-btn text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"  value="update" >Update</button>

                
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
        $q="UPDATE `registration` SET `name`='$name',`username`='$username',`email`=' $email',`password`='$password',`mobile`='$mobile',`dob`='$dob',`gender`='$gender',`city`='$city' WHERE id=$id";

        $result=mysqli_query($connect,$q);

        if($result){
            echo"<script>alert('profile updated')
         window.location.href='user.html#!/user_profile'</script>";
    
    
        }
        else{
             echo"<script>alert('error')
             window.location.href='user.html#!/user_profile'</script>";
        
            }
}
?> 
                    
                </dd>
            </div>
        </dl>
    </div>
</div>

    <!-- temp -->


       
        
        </center>
    </form>
    </div>


    

    <footer>
    <div class="footerContainer">
        <div class="socialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
            <ul><li><a href="user_home.php">Home</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="feedback.php">Feedback</a></li>

                <li><a href="#">our Team</a></li>
            </ul>
        </div>
        
    </div>
    <div class="footerBottom">
        <p>Copyright &copy;2023; Designed by <span class="designer">AnyMart Team</span></p>
    </div>
</footer>
    


    
</body>
</html>