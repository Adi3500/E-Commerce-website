<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="userhome.css" >
    <script src="https://cdn.tailwindcss.com"></script>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


    <style>

        .flexw{
            display: flex;
        }

    </style>
</head>
<?php

session_start();
require('db.php');
if (!isset($_SESSION['user'])) {
    echo "<center><h2 style='color:red'>Oops! you have to Loging First :
    <a href='login.php'>login</a></h2></center>";
    //header('Location: login.php');
    exit();
}
?>



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
                        <a class="hover:text-[#1da1f2]  rounded-full text-slate-950" href="about_us.html">About Us</a>
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
    <br><br><?php
    $username = $_SESSION['user'];
    $sql = "SELECT * FROM `custom` where username='$username'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);
    if ($num <= 0) {
        echo "<label style='color';>order your own custom product on:<a href='custom.php'>custom product</a>'";
    } else {
        ?>
        <form action="" method="post">
        <div class="container mx-auto px-4 flex justify-center">
        <?php
        // PHP code for fetching and displaying cards
        ?>
        <?php
        // Your PHP code for fetching data and displaying cards goes here
        ?>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:white-gray-800 dark:border-gray-700 flex flex-col justify-between mx-4 my-8'>";
            echo "<div>";
            echo "<h2 class='text-2xl font-bold p-4'>Design:</h2>";
            echo "<img class='p-8 rounded-t-lg' src='" . $row["design"] . "' alt='Custom Image' height='150' width='200'>";
            echo "</div>";
            echo "<div class='px-4 py-2'>";
            echo "<p class='text-gray-800 font-semibold'>Username: " . $row["username"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Side: " . $row["side"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Size: " . $row["size"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Color: " . $row["colour"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Fabric: " . $row["fabric"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Type: " . $row["type"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Neck Design: " . $row["neck_design"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Quantity: " . $row["quantity"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>Price: ₹" . $row["price"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>contact seller: " . $row["seller_contact"] . "</p>";
            echo "<p class='text-gray-800 font-semibold'>mail:" . $row["seller_email"] . "</p>";

            if ($row["status"] == "confirm") {
                echo "<br><center><a href='custom_buy_product.php?id=$row[id]'<button name='buy' class=' bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-24 rounded'>&nbsp; Order</button></a></center>";
            } else {
                echo "<p class='text-gray-800 font-semibold'>Status: " . $row["status"] . "</p>";
            }
            echo "</div>";
            echo "<div class='p-4 flex justify-center'>";
            echo "<form method='post'>";
            echo "<button name='cancel' class='py-2 px-24 bg-red-500 hover:bg-red-700 text-white font-bold  rounded'>Cancel</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            if(isset($_POST['cancel'])){
                $qu="DELETE FROM `custom` WHERE id=$row[id]";
                $r=mysqli_query($connect,$qu);
            }
        }}
        ?>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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