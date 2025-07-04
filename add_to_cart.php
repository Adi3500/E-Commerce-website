<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="userhome.css">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<?php

session_start();

?>
    <style>
        /* Custom styles */
        

        .product-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            margin-bottom: 20px;
            padding: 15px;
        }

        .product-image {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 5px;
            shape-image-threshold: ;
        }

        .footer {
            background-color: #fff;
            border-top: 1px solid #e0e0e0;
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .place-order-btn {
            width: 100%;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            animation-name: modalopen;
            animation-duration: 0.4s;
        }

        @keyframes modalopen {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="  h-full w-full bg-slate-300" style="">



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
    <div class="container mx-auto capitalize w-3/4">


    <!-- Product Cards -->
    <?php
    require('db.php');
    if (!isset($_SESSION['user'])) {
        echo "<div class='alert alert-danger'>You need to login first!</div>";
        exit();
    }
    $username = $_SESSION['user'];
    $sql = "SELECT * FROM `atc` WHERE username='$username'";
    $res = mysqli_query($connect, $sql);
    while ($row = mysqli_fetch_array($res)) {
        echo "<div class='product-card'>";
        echo "<div class='flex'>";
        echo "<div class='w-1/4'>";
        echo "<a  href='product_review.php?id=$row[product_id]'><img src='$row[image]' class='product-image img-thumbnail shadow-lg border-4 border-zinc-50 border-y-zinc-50' style='width: 200px; height: 200px;'></a>";
        echo "</div>";
        echo "<div class='w-3/4 text-capitalize'>";
        echo "<h4 class='font-bold'>$row[product]</h4>";
        echo "<p>$row[discription]</p>";
        echo "<p>Quantity : <span>$row[quantity]</span></p>";
        if ($row['category'] == 't shirt' || $row['category'] == 'hoodies') {
            echo"     
                 <p>Size :
                 <span> $row[size]</span></p>
             ";
        }
        else{
            echo"      
                 <p>Material :
                 <span> $row[material]</span>
             </p>";
        }
        
        echo "<p>Price: <span class='text-blue-500'>₹$row[price]</span></p>";
        echo"<br>";
        echo "<a href='add_to_cart_delete?id=$row[id]'><button class='text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900' data-id='$row[id]'>Remove</button></a><span>  </span>";
        echo "<a href='product_review.php?id=$row[product_id]'><button class='text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800' > Buy </button></a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>
<br><br><br><br><br>

<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="flex justify-between">
            <div class="w-1/2">
                <?php
                $sql = "SELECT SUM(t_price) AS total_price FROM `atc` WHERE username='$username'";
                $result = mysqli_query($connect, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalPrice = number_format($row['total_price'], 2);
                echo "<h4>Total Price: ₹$totalPrice</h4>";
                ?>
            </div>
            <div class="w-1/2 text-right">
                <!-- Button to open modal -->
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" onclick="openModal()">Place Order</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 class="text-2xl font-bold mb-4">Confirm Order</h2>
        <p class="mb-4">Are you sure you want to place this order?</p>
        <div class="flex justify-end">
            <button class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" onclick="closeModal()">Close</button>
            <a href="atc_buy_product.php">
                <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Place Order</button>
            </a>
        </div>
    </div>
</div>

<script>
    // Open the modal
    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    // Close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }
</script>

</body>

</html>
