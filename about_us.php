<!DOCTYPE html>
<html lang="en">

<head>
<?php
  session_start();
  ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Anime Merchandise Store</title>
    <link rel="stylesheet" href="userhome.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Add your CSS styles here */
        
        header {
            background-color: #333;
            color: #fff;
            /* padding: 20px; */
            text-align: center;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="font-[Poppins]  h-full w-full bg-slate-300">


    <header class="bg-white">
        <div class="  w-full drop-shadow-xl">
            <nav class="flex justify-between items-center w-full px-16 py-0  mx-auto   ">
                <div>
                    <!-- <img class="w-16 cursor-pointer" src="image/anymartlogo.png" alt="..."> -->
                    <h2 class="w-16 py-4 cursor-pointer text-2xl font-bold text-black">AnyMart</h2>
                </div>
                <div class="nav-links duration-500 md:static absolute  text-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
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
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button"><?php if(isset($_SESSION['user'])){$user=$_SESSION["user"]; echo"$user";}else{ echo"Sign In";}?> <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>
                </div>
        </div>
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
    <li>
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

    <header>
        <!-- <h1> ZORO-TO Store</h1> -->
    </header>
    <div class="container w-3/4">
        <h2 class="font-bold text-3xl">Our Story</h2><br>
        <p>Welcome to the Zoro-To Store! We are passionate about bringing you the best anime-related products and collectibles from your favorite shows and characters.</p>

        <br>
        <h2 class="font-bold text-3xl">Our Mission</h2><br>
        <p>Our mission is to provide anime enthusiasts with a one-stop shop for high-quality merchandise. Whether you're a fan of action-packed shonen series or heartwarming slice-of-life anime, we have something for everyone.</p>

        <br>
        <h2 class="font-bold text-3xl">Why Choose Us?</h2><br>
        <ul>
            <li>Wide selection of officially licensed merchandise</li>
            <li>Competitive prices and special offers</li>
            <li>Secure online shopping experience</li>
            <li>Fast and reliable shipping</li>
            <li>Passionate and knowledgeable customer support</li>
        </ul>

        <br>
        <h2 class="font-bold text-3xl">Contact Us</h2><br>
        <p>If you have any questions, suggestions, or concerns, please don't hesitate to get in touch with us. We value your feedback and are here to assist you.</p>
        <p>Email: contact@anime-merchstore.com</p>

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