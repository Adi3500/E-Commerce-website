<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
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
  <style>
   
   .product-card {
  border: 1px solid #ccc;
  padding: 10px;
  width: 100%; /* Adjust this width according to your layout */
  display: flex; /* Use flexbox to align items horizontally */
}

.product-details {
  margin-left: 20px; /* Add space between image and details */
  flex-grow: 1; Allow the details to take remaining space
}

.order {
  border: 1px solid #ccc;
  padding: 10px;
  margin-bottom: 10px;
}

.products-list {
  list-style-type: none;
  padding: 0;
}

.product {
  margin-bottom: 10px; /* Add margin between each product */
}

/* Add any additional styling as needed */

  </style>
</head>
<body>
  <body class="font-[Poppins]  h-full w-full ">

<header class="bg-white shadow-lg">
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
  <h1 class="font-bold text-2xl py-6 px-16">Custom Orders</h1>
  <?php
 
  include('db.php');

 
 $user=$_SESSION['user'];
  if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
  }

 
  $sql = "SELECT * FROM `custom_order` where username='$user'";
  $result = $connect->query($sql);

  $n=1;
  if ($result !== false && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "<div class='order capitalize'>";
echo "<h2 class='px-6'>Order #" . $n . "</h2>";
echo "<ul class='products-list'>";
      
echo "<li class='product'>";
echo "<div class='product-card'>";
echo "<a href='user_custom_order_detail.php?id=" . $row["id"] . "'>";
echo "<img src='" . $row["design"] . "' alt='Product Image' width='200' height='200'/>";
echo "</a>";
echo "<div class='product-details text-2xl py-6'>";
echo "<div class='font-bold'>" . $row["type"] . "</div><br>";
echo "<div>Size :" . $row["size"] . "</div>";
echo "<div>Quantity : " . $row["quantity"] . "</div>";
echo "<div ><span class='font-bold'>Price :</span>  <label class='text-[#1da1f2]'>₹" . $row["price"] . "</label> </div>"; // Include the price here
echo "</div>";
echo "</div>";
echo "</li>";
echo "</ul>";
echo "</div>";
$n=$n+1;
    }
  } else {
    echo "0 results";
  }
  $connect->close();
  ?>
</body>
</html>
