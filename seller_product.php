<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script> -->
    





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
  <div class="main-title">
    <!-- <p class="font-weight-bold">DASHBOARD</p> -->
  </div>
<div class="container">
        <br />
        <form method="post" enctype="multipart/form-data">
            <div class="login-container">

               
                <label class="font-bold">Product</label>
                <input type="text" name="product"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <br />
                <label class="font-bold">Price</label>
                <input type="text" name="price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <br />
                <label class="font-bold">Stock</label>
                <input type="number" name="quantity"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <br />
                <label class="font-bold">Category</label>
                <select name="category" id="category" class='block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <?php
                    require('db.php');
                    $q = "SELECT * FROM `category`";
                    $r = mysqli_query($connect, $q);
                    while ($row = mysqli_fetch_array($r)) {
                        echo " <option value='$row[1]'>$row[1]</option>";
                    }

                    ?>
                </select>
                <label class="font-bold">Description</label>
                <input type="text" name="discription" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                <br />
                <label class="font-bold">Image</label>
                <input type="file" name="image" id="image" class="block  w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"/>
                <br />
                <label class="font-bold">Popular</label>
                <input type="radio" name="popular" value="Yes">Yes
                <input type="radio" name="popular" value="No" checked>No <br />
                <br />
                
                <a href='seller_product.php'> <button type='submit' name='Insert' 
                        value='ADD' class='text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2'>ADD</button></a>
                <?php
                if (isset($_POST['Insert'])) {


                    $image_name = $_FILES['image']['name'];
                    $image_ext = $_FILES['image']['type'];
                    $image_tmp = $_FILES['image']['tmp_name'];
                    $image_size = $_FILES['image']['size'];
                    $folder = "image/";
                    if (strtolower($image_ext) == "image/jpg" || strtolower($image_ext) == "image/jpeg" || strtolower($image_ext) == "image/png" || strtolower($image_ext) == "image/webp") {
                        $folder = $folder . $image_name;
                       

                        $seller_username = $_SESSION['username'];
                        
                        $product = $_POST['product'];
                        $price = $_POST['price'];
                        $stock=$_POST['quantity'];
                        $category = $_POST['category'];
                        $dis = $_POST['discription'];
                        $popular = $_POST['popular'];
                        $m1 = metaphone($product);
                        $m2 = metaphone($dis);
                        $search = "$m1" . "$m2";
                        $size="---";
                        move_uploaded_file($image_tmp, $folder);
                        $query = "INSERT INTO `product`(`seller_name`, `product`, `price`, `category`, `discription`, `image`, `popular`, `search`, `size`, `quantity`) VALUES ('$seller_username','$product','$price','$category','$dis','$folder','$popular','$search','$size','$stock')";
                        $result = mysqli_query($connect, $query);
                        move_uploaded_file($image_tmp, $folder);

                        if ($result) {
                            echo "<script>alert('data added')
                            window.location.href='seller_product.php'</script>";


                        } else {
                            echo "<script>alert('error')
             </script>";

                        }
                    }
                    else{
                      echo "<script>alert('please select jpeg or png file')
             </script>";
                    }
                }

                ?> <br> <br>
                <div>

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  border-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">id</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">product</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">price</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">stock</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">category</th>
                                <th style="text-align:center;" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">description</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">image</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">popular</th>
                                <th scope="col" class="px-6 py-3 border border-gray-400 px-4 py-2 text-gray-800">Operation</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('db.php');
                            $seller_username = $_SESSION["username"];
                            
                            $sql = "SELECT * FROM `product` where `seller_name`='$seller_username'";
                            $res = mysqli_query($connect, $sql);

                            $no = 1;

                            while ($row = mysqli_fetch_array($res)) {
                                echo "<tr class='odd:bg-white even:bg-gray-100 hover:bg-gray-100 dark:odd:bg-gray-800 dark:even:bg-gray-700 dark:hover:bg-gray-700 '> <td class='px-8'>" . $no . "</td>
    <td class='capitalize'>" . $row['product'] . "</td>
    <td>" . $row['price'] . "</td>
    <td>" . $row['quantity'] . "</td>
    <td>" . $row['category'] . "</td>
    <td>" . $row['discription'] . "</td>
    <td><img src='$row[image]' height='70' width='80'></td>
    <td >" . $row['popular'] . "</td>
    <td class='py-8'>
 
    <a href='seller_productDelete.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-6 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Delete </button></a>
    <br>
    <br>
    
    <a href='seller_productUpdate.php?id=$row[id]'<button class='text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 shadow-lg' value='delete' id='delete_button' name='d'>Update</button></a></td>
    </tr>";
                                $no = $no + 1;
                            }

                        

                            ?>



                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

<!-- End Main -->

</div>

<!-- Scripts -->
<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>

<!-- temp -->

    <!-- temp -->

    
    
        
            

                        

        </div>
    </div>
</body>

</html>





<body>

    
</body>

</html>