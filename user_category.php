<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <style>
   .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px; 
            /* justify-content: space-around; */
            left:20px;
            
        }

        /* Style for each image and description */
        .image-card {
            width: calc(23.33% - 20px); /* Adjust the width as needed */
            /* text-align: center; */
            padding: 10px;
            /* border: 1px solid #ccc; */
            
        }

        .image-card img {
            max-width: 200px;
            height: 200px;
            object-position: center;
            /* padding: 10px 50px; */
            margin: 0px 50px;
        }

        /* Style for image descriptions */
        .image-description {
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body class="font-[Poppins]  h-full w-full bg-slate-300" style="">
    <div >
    <center>


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
    <br>
<main>
<section>
<?php
require('db.php');
$name = $_GET['id'];
$query = "SELECT * FROM product WHERE category='$name' ";
$result = mysqli_query($connect, $query);

echo "<div class='text-center'>";
echo "<h1 class='capitalize font-bold text-4xl bg-white py-4'>" . $name . "</h1>";
echo "</div>";

$tourCount = 0;

echo "<div class='flex flex-wrap justify-center'>";
while ($row = mysqli_fetch_array($result)) {
    echo '<div class="image-card m-5 flex flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">';
    echo '<img class="object-cover h-64" src="' . $row['image'] . '" alt="' . $row['product'] . '">';
    echo '<div class="p-4">';
    echo '<h2 class="capitalize text-2xl">' . $row['product'] . '</h2>';
    echo '<p class="font-bold text-2xl">₹ ' . $row['price'] . '</p>';
    echo "<a class='flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300' href='product_review.php?id=$row[id]'>";
    echo "<svg xmlns='http://www.w3.org/2000/svg' class='mr-2 h-6 w-6' fill='none' viewBox='0 0 24 24' stroke='currentColor' stroke-width='2'>
                <path stroke-linecap='round' stroke-linejoin='round' d='M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z' />
              </svg>Book Now</a>";
    echo '</div>';
    echo '</div>';

    $tourCount++;

    if ($tourCount % 4 === 0) {
        echo "</div>";
        echo "<div class='flex flex-wrap justify-center'>";
    }
}

echo "</div>";

mysqli_close($connect);
?>

        </section>
    </main>
    </center>
    </div>
    
</body>
</html>