<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Page</title>

    <script src="https://cdn.tailwindcss.com"></script>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="userhome.css">

    <?php
       session_start();
       if(!isset($_SESSION['user']))
       {
           echo " <center><h2 style='color:red; border= 2px solid red;'; text-align: center;>Oops! you have to Loging First
           <a href='login.php'>login</a></h2></center>";
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
   $email=$row[3];
   

   }
}
else{
   echo"data not found";
}
?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        textarea {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            align-self: flex-end;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="font-[Poppins]  h-full w-full bg-slate-300" style="">


<!-- navbar -->

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


<!-- navbar -->

    <div class="container w-2/4">
        <h1 class="font-bold text-2xl">Feedback Form</h1>
        <form action="#" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"  value="<?php echo $name?>" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"  value="<?php echo $email?>" required>
            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feed" rows="6" required></textarea><br>
            <input type="submit" name="submit" value="Submit">
            <?php
if(isset($_POST['submit'])){
   
    // $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feed = $_POST['feed'];
    
    $q = "INSERT INTO `feedback`( `name`, `email`, `feedback`) VALUES ( '$name', '$email', '$feed')";
    $result = mysqli_query($connect, $q);

    if ($result) {
        echo "<script>alert('feedback has been submitted')</script>";
    } else {
        echo "<script>alert('Error submitting query')</script>";
    }
}
?>
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
