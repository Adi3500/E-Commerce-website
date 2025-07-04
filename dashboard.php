<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css">
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

    <div >
        <?php
        include('db.php');
        $q="SELECT * FROM `category`";
        $r=mysqli_query($connect,$q);
        $totalCategories =mysqli_num_rows($r); 
        $qu="SELECT * FROM `product`";
        $re=mysqli_query($connect,$qu);
        $totalProducts = mysqli_num_rows($re); 
        $que="SELECT * FROM `registration`";
        $res=mysqli_query($connect,$que);
        $totalUsers =  mysqli_num_rows($res); 
        $totalProducts = mysqli_num_rows($re); 
        $quer="SELECT * FROM `seller`";
        $resu=mysqli_query($connect,$quer);
        $totalseller =  mysqli_num_rows($resu);    
        ?>

       <!-- <a href="admin.html#!/category" ><div class="block">
            <h1>Total Categories</h2>
            <h3><?php echo $totalCategories; ?></h3>
        </div></a>
        <br/>
        <a href="admin.html#!/productMan"><div class="block">
            <h2>Total Products</h2>
            <h3><?php echo $totalProducts; ?></h3>
        </div></a>
        <br/>   
        <a href="admin.html#!/userMan"><div class="block">
            <h2>Total Users</h2>
            <h3><?php echo $totalUsers; ?></h3>
        </div></a> -->
    </div>
    
    </div>




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
    $sql="SELECT * FROM `login` WHERE  username='$user'";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_array($result)){
    ?>

    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center  pe-1 font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
<span class="sr-only">Open user menu</span>
<img class="w-8 h-8 me-2 rounded-full" src='image/ace.jpg' alt="user photo">
<?php
    
                        echo "$row[username]"; ?>
<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
</svg>
</button>

<!-- Dropdown menu -->
<div id="dropdownAvatarName" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
      <div class="font-medium ">Pro User</div>
      <div class="truncate"><?php echo"$row[username]123@gmail.com"; }?></div>
    </div>
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
      <li>
        <a href="dashboard.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
      </li>
     
      <li>
        <a href="admin_saled.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
      </li>
    </ul>
    <div class="py-2">
      <a href="login.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a>
    </div>
</div>



    <!-- login icone -->


  </div>
</header>
<!-- End Header -->

<!-- Sidebar -->
<aside id="sidebar">
  <div class="sidebar-title">
    <div class="sidebar-brand">
      <span class="material-icons-outlined">inventory</span> Admin Login
    </div>
    <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
  </div>

  <ul class="sidebar-list">
    <li class="sidebar-list-item">
      <a href="dashboard.php" target="">
        <span class="material-icons-outlined">dashboard</span> Dashboard
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="productman.php " target="">
        <span class="material-icons-outlined">inventory_2</span> Products
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="category.php" target="">
        <span class="material-icons-outlined">category</span> Category
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="userMan.php" target="">
        <span class="material-icons-outlined">person</span> User
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="sellerman.php" target="">
        <span class="material-icons-outlined">person</span> Seller
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="deliveryman.php" target="">
        <span class="material-icons-outlined">person</span> Delivery Boy
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_order.php " target="">
        <span class="material-icons-outlined">inventory_2</span> Order
      </a>
    </li>
    <li class="sidebar-list-item">
      <a href="admin_saled.php" target="">
        <span class="material-icons-outlined">inventory_2</span> Saled products
      </a>
    </li>
    
    <li class="sidebar-list-item">
      <a href="admin_feedback.php" target="">
        <span class="material-icons-outlined">rate_review</span> Customer Feedback
      </a>
    </li>
    
    
</aside>
<!-- End Sidebar -->

<!-- Main -->
<main class="main-container">
  <div class="main-title">
    <!-- <p class="font-weight-bold">DASHBOARD</p> -->
  </div>

  <div class="main-cards">

    <div class="card">
      <div class="card-inner">
        <p class="text-primary">PRODUCTS</p>
        <span class="material-icons-outlined text-blue">inventory_2</span>
      </div>
      <span class="text-primary font-weight-bold"><?php echo $totalProducts; ?></span>
    </div>

    <div class="card">
      <div class="card-inner">
        <p class="text-primary">USER</p>
        <span class="material-icons-outlined text-orange">person</span>
      </div>
      <span class="text-primary font-weight-bold"> <?php echo $totalUsers; ?></span>
    </div>

    <div class="card">
      <div class="card-inner">
        <p class="text-primary">CATEGORY</p>
        <span class="material-icons-outlined text-green">category</span>
      </div>
      <span class="text-primary font-weight-bold"> <?php echo $totalCategories; ?></span>
    </div>

    <div class="card">
      <div class="card-inner">
        <p class="text-primary">SELLER</p>
        <span class="material-icons-outlined text-red">person_2</span>
      </div>
      <span class="text-primary font-weight-bold"><?php echo $totalseller; ?></span>
    </div>

  </div>

  <!-- <div class="charts">

    <div class="charts-card">
      <p class="chart-title">Top 5 Products</p>
      <div id="bar-chart"></div>
    </div>

    <div class="charts-card">
      <p class="chart-title">Purchase and Sales Orders</p>
      <div id="area-chart"></div>
    </div>

  </div> -->
  <?php
  include("chat.php");
?>
</main>
<!-- End Main -->

</div>

<!-- Scripts -->
<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- temp -->
</div>
</body>
</html>
