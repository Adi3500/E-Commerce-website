<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />      -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script> -->

  <style>
    
  </style>
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
        <h2 class="text-4xl font-bold">Product </h2>
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
        <form action="productMan.php" method="post" enctype="multipart/form-data" class="">
        <div class="login-container">
        <input type="text" name="seller" placeholder="search by seller name" id=""/>
          <button  name="search" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">search</button>    
            
            <div>
<br>
<br>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border-collapse border-2 border-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">Product ID</th>
                            <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">seller_name</th>
                            <th scope="col"  class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800"> Name</th>
                            <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">Price</th>
                            <th scope="col"  class="px-2 py-3 border border-gray-400 px-4 py-2 text-gray-800">Category</th>
                            <th scope="col"  class="px-2 py-3 border border-gray-400 px-4 py-2 text-gray-800">stock</th>
                            <th style="text-align:center;"  class="px-2 py-3 border border-gray-400 px-4 py-2 text-gray-800">Description</th>
                            <th scope="col"  class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">Image</th>
                            <th scope="col"  class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">Popular</th>
                            <th scope="col"  class="px-8 py-3 border border-gray-400 px-4 py-2 text-gray-800">Operations</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('db.php');
                        if(isset($_POST['search'])){
                          $search=$_POST['seller'];
                        $sql = "SELECT * FROM `product` where `seller_name`='$search'";
                        $res = mysqli_query($connect, $sql);
                        
                        $no = 1;
                        
                        while ($row=mysqli_fetch_array($res)) {
                            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 '> <td class='px-6 py-4 font-semibold text-gray-900 dark:text-white '>" . $no . "</td>
                            <td>" . $row[1] . "</td>
                            <td>" . $row[2] . "</td>
                            <td>" . $row[3] . "</td>
                            <td>" . $row[4] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>" . $row[5] . "</td>
                            <td><img src='$row[6]' height='70' width='80'></td>
                            <td>" . $row[7] . "</td>
                        
    <td class='px-8' >
    <a href='productMan_delete.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-6 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Delete </button></a>
 <br>
 <br>

    <a href='productMan_update.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Update</button></a></td>
    </tr>";
                            $no = $no + 1;
                        }

                      }
                      else{
                        $sql = "SELECT * FROM `product` order by id";
                        $res = mysqli_query($connect, $sql);
                        
                        $no = 1;
                        
                        while ($row=mysqli_fetch_array($res)) {
                            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 '> <td class='px-6 py-4 font-semibold text-gray-900 dark:text-white '>" . $no . "</td>
                            <td>" . $row[1] . "</td>
                            <td>" . $row[2] . "</td>
                            <td>" . $row[3] . "</td>
                            <td>" . $row[4] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>" . $row[5] . "</td>
                            <td><img src='$row[6]' height='70' width='80'></td>
                            <td>" . $row[7] . "</td>
                        
    <td class='px-8' >
    <a href='productMan_delete.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-6 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Delete </button></a>
 <br>
 <br>

    <a href='productMan_update.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Update</button></a></td>
    </tr>";
                            $no = $no + 1;
                        }

                      }

                        ?>



                    </tbody>
                </table>
            </div>
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


</body>

</html>