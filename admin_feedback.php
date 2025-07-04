<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->

</head>
<?php

session_start();
require('db.php');
if (!isset($_SESSION['username'])) {
    echo "<center><h2 style='color:red'>Oops! you have to Loging First :
    <a href='login.php'>login</a></h2></center>";
    //header('Location: login.php');
    exit();
}
?>
<body>




<div class="grid-container">

<!-- Header -->
<header class="header">
  <div class="menu-icon" onclick="openSidebar()">
    <span class="material-icons-outlined">menu</span>
  </div>
  <div class="header-left">
    <!-- <span class="material-icons-outlined">search</span> -->
        <h2 class="text-4xl font-bold">User </h2>
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

  
  <div class="container">
        <br />
        <form action="" method="post" enctype="multipart/form-data">
        <div class="login-container">

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-3 py-3 ">id</th>
            <th scope="col" class="px-3 py-3">Name</th>
           
            <th scope="col" class="px-3 py-3">Email</th>
            <th scope="col" class="px-3 py-3">Feedback</th>
            
            



        </tr>
    </thead>
    <tbody>
        <?php
        include('db.php');

        $sql = "SELECT * FROM `feedback`";
        $result = mysqli_query($connect, $sql);

        $no = 1;
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:hover:bg-gray-700 '> <td class='p-4  font-semibold text-gray-900 dark:text-white'>" . $no . "</td>

<td class=''>" . $row[1] . "</td>
<td >" . $row[2] . "</td>
<td >" . $row[3] . "</td>



<td >



</tr>";
            $no = $no + 1;
        }



        ?>



    </tbody>
</table>
</div>

</form>
</div>
  
</main>
<!-- End Main -->

</div>

<!-- Scripts -->
<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>

<!-- temp -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>


</body>
</html>