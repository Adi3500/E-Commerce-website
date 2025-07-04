<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <title>Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css">
    
</head>

<body>


    <!-- temp -->

    <?php

session_start();
require('db.php');
if (!isset($_SESSION['username'])) {
    echo "<center><h1 class='text-5xl font-extrabold dark:text-red-500 py-72'>Oops! you have to Logging First :
    <a href='login.php'><span class='text-sky-600 underline underline-offset-8'>login</span></a></h1></center>";
    //header('Location: login.php');
    exit();
}
?>
</head>
<body >
<!-- <div class="login-container"> -->

    <!-- <div class="dashboard">
    <br/> -->

    <!-- <h1 style="color:white">Admin DashBoard</h1> -->
    <!-- <br/> -->

   
    
    




<!-- temp -->

<div class="grid-container">

<!-- Header -->
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
    <!-- <span class="material-icons-outlined">search</span> -->
        <h2 class="text-4xl font-bold">AnyMart </h2>
  </div>
  <div class="header-right">
    
    <!-- <span class="material-icons-outlined">account_circle</span> -->


    <!-- login icone -->

    

    <?php $user = $_SESSION["username"];
    $sql="SELECT * FROM `seller` WHERE  sellername='$user'";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
    ?>

    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center  pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
<span class="sr-only">Open user menu</span>
<img class="w-8 h-8 me-2 rounded-full" src='<?php echo"$row[image]";?>' alt="user photo">
<?php
    
                        echo "$row[sellername]"; ?>
<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
      <div class="font-medium ">Pro User</div>
      <div class="truncate"><?php echo"$row[email]"; }?></div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
    <li>
        <a href="seller_profile.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">My Profile</a>
      </li>
      <li>
        <a href="seller_dasboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
      </li>
      
      <li>
        <a href="Sellersaled_products.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
      </li>
    </ul>
    <div class="py-2">
      <a href="login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log out</a>
    </div>
</div>



    <!-- login icone -->


    <!-- login icone -->


  </div>
</header>
<!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
      <span class="material-icons-outlined">inventory</span> Seller Login
    </div>
    <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
  </div>

  <ul class="sidebar-list">
  <li class="sidebar-list-item">
      <a href="seller_dasboard.php" target="">
        <span class="material-icons-outlined">dashboard</span> Dashboard
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="seller_product.php " target="">
        <span class="material-icons-outlined">inventory_2</span> Products
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="seller_custom.php" target="">
        <span class="material-icons-outlined">tune</span> Custom 
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="seller_custom_order.php" target="">
        <span class="material-icons-outlined">tune</span> Custom order 
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="Seller_order_product.php" target="">
        <span class="material-icons-outlined">tune</span> Order Product 
      </a>
    </li>
    </li>
    <li class="sidebar-list-item">
      <a href="Sellersaled_products.php " target="">
        <span class="material-icons-outlined">inventory_2</span> Saled Products
      </a>
    </li>
    
    
    
</aside>
<!-- End Sidebar -->

<!-- Main -->
<main class="main-container">
    <?php
    include('db.php');
    $user=$_SESSION['username'];
    $sql = "SELECT * FROM delivered_product Where sellername = '$user'" ; // Selecting all rows from delivered_product table
    $result = mysqli_query($connect, $sql);

    $totalPrice = 0; // Initialize total price variable
    $totalQuantity = 0; // Initialize total quantity variable

    echo "<table class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400'>
        <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
            <tr>
                <th scope='col' class='px-3 py-3'>DeliveryBoy name</th>
                <th scope='col' class='px-3 py-3'>Sellername</th>
                <th scope='col' class='px-3 py-3'>username</th>
                <th scope='col' class='px-3 py-3'>product</th>
                <th scope='col' class='px-3 py-3'>Discription</th>
                <th scope='col' class='px-3 py-3'>category</th>
                <th scope='col' class='px-3 py-3'>Price</th>
                <th scope='col' class='px-3 py-3'>Image</th>
                <th scope='col' class='px-3 py-3'>Quantity</th>
                <th scope='col' class='px-8 py-4'>User Contact</th>
                <th scope='col' class='px-8 py-4'>User Address</th>
                <th scope='col' class='px-8 py-4'>Seller Contact</th>
                <th scope='col' class='px-8 py-4'>Date</th>
                <th scope='col' class='px-8 py-4'>Time</th>
                <th scope='col' class='px-8 py-4'>Delivery Charge</th>
                <th scope='col' class='px-8 py-4'>Total price</th>
            </tr>
        </thead>
        <tbody>";

    while ($row = mysqli_fetch_array($result)) {
        $totalPrice += $row['t_price']; // Accumulate total price
        $totalQuantity += $row['quantity']; // Accumulate total quantity
        echo "<tr class='odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 '> 
            <td>" . $row['deliveryBoy_username'] . "</td>
            <td>" . $row['sellername'] . "</td>
            <td>" . $row['username'] . "</td>
            <td>" . $row['product'] . "</td>
            <td>" . $row['price'] . "</td>
            <td><img src='" . $row['image'] . "' height='70' width='80'></td>
            <td>" . $row['quantity'] . "</td>
            <td>" . $row['user_contact'] . "</td>
            <td>" . $row['user_address'] . "</td>
            <td>" . $row['seller_contact'] . "</td>
            <td>" . $row['date'] . "</td>
            <td>" . $row['time'] . "</td>
            <td>" . $row['del_price'] . "</td>
            <td>" . $row['t_price'] . "</td>
        </tr>";
    }
    $sqll = "SELECT * FROM custom_delivered Where sellername = '$user'" ; // Selecting all rows from delivered_product table
    $results = mysqli_query($connect, $sqll);
    while ($row = mysqli_fetch_array($results)) {
      echo "<tr class='odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 '> 
      <td>" . $row['deliveryBoy_username'] . "</td>
      <td>" . $row['sellername'] . "</td>
      <td>" . $row['username'] . "</td>
      <td>" . $row['type'] . "</td>
      <td>" . $row['price'] . "</td>
      <td><img src='" . $row['design'] . "' height='70' width='80'></td>
      <td>" . $row['quantity'] . "</td>
      <td>" . $row['user_contact'] . "</td>
      <td>" . $row['user_address'] . "</td>
      <td>" . $row['seller_contact'] . "</td>
      <td>" . $row['date'] . "</td>
      <td>" . $row['time'] . "</td>
      <td>" .'---' . "</td>
      <td>" . $row['price'] . "</td>
  </tr>";
    }

    echo "</tbody>
        <tfoot>
            <tr colspan='15'>
                <td >Total Price:-</td>
                <td>$totalPrice</td>
            </tr>
            <tr colspan='15'>
                <td >Total Quantity of saled products:-</td>
                <td>$totalQuantity</td>
            </tr>
        </tfoot>
    </table>";

    ?>

 
</main>
<!-- End Main -->

</div>

<!-- Scripts -->

<script src="js/scripts.js"></script>

<!-- temp -->

    <!-- temp -->

    
    
        
            
        </div>
    </div>
</body>

</html>

