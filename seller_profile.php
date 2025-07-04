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


<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            background-color: rgba(0, 0, 0, 0.051);
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 500px;
            border-radius: 5px;
        }
        .form-label {
            font-weight: 500;
            color: #374151;
        }
        .form-input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            outline: none;
        }
        .submit-btn {
            /* width: 100%; */
            padding: 10px;
            margin-top: 15px;
            background-color: #3b82f6;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            outline: none;
        }
    </style>
    
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
        $user=$_SESSION['username'];
        $q="SELECT * FROM `custom_order` where sellername='$user'";
        $r=mysqli_query($connect,$q);
        $totalCategories =mysqli_num_rows($r); 
        $qu="SELECT * FROM `product` where seller_name='$user'";
        $re=mysqli_query($connect,$qu);
        $totalProducts = mysqli_num_rows($re); 
        $que="SELECT * FROM `order` where sellername='$user'";
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
      <div class="truncate"><?php echo"$row[email]"; ?></div>
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

  <div id="user-body">
    <form action="user_profile.php" method="post">
        <center>
    <div class="login-container">
</br>



<!-- temp -->

<div class="bg-white max-w-2xl shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
    <h2 class="text-2xl font-bold mb-4">My Profile</h2>
                
    
    <div class="flex justify-center items-center ">
    <div class="rounded-full overflow-hidden border-4 border-white">
            <img class="w-32 h-32 object-cover" src="<?php echo $row['image']?>" alt="Profile Image">
        </div> 
        </div><br>  
    
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-input" value="<?php echo $row['name']?>" />
                </div>
                <!-- Add similar blocks for other input fields -->
                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" value="<?php echo $row['sellername']?>" />
                </div>
                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" value="<?php echo $row['email']?>" />
                </div>
                <!-- Password -->
                
                <!-- Mobile -->
                <div class="mb-4">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" id="mobile" name="mobile" class="form-input" value="<?php echo $row['mobile']?>" />
                </div>
                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-input" value="<?php echo $row['dob']; ?>" />
                </div>
            </div>
            <!-- Gender -->
            <div class="mb-4">
                    <label class="form-label">Gender</label>
                    <div>

                    <div>
                        

                <?php
            if($row['gender']=="male"){
echo"<input type='radio' name='gender' value='male' checked/>&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='gender'  value='female'>Female";

            }
            else{
                echo"<input type='radio' name='gender' value='male'/> Male
                <input type='radio' name='gender'  value='female'  checked>Female"; 
            }
            ?>

                    
                </div>
            </div>
            
            <!-- City -->
        <div class="mb-4">
                    <label for="city" class="form-label">City</label>

                <select name="city"  class="form-input mb-4"> 
            <?php
            if($row['city']=="surat"){
              echo"  <option value=''>'select state'</option>
                <option value='surat' selected>surat</option>
             <option value='rajkot'>rajkot</option>
             <option value='vapi'>rajkot</option></select>";
            }
            elseif($row['city']=="vapi"){
                
                    echo"  <option value=''>'select state'</option>
                      <option value='surat' >surat</option>
                   <option value='rajkot'>rajkot</option>
                   <option value='vapi' selected >rajkot</option></select>";
            }
            else{
                echo"  <option value=''>'select state'</option>
                      <option value='surat' >surat</option>
                   <option value='rajkot'selected>rajkot</option>
                   <option value='vapi'>rajkot</option></select>";
            }
            ?>

                    
                
        </div>

            
                <button type="submit" name="update" class=" submit-btn text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"  value="update" >Update</button>

                
                <?php
    }
        if(isset($_POST['update'])){
        $name=$_POST['name'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $mobile=$_POST['phone'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $city=$_POST['city'];
        $q="UPDATE `registration` SET `name`='$name',`username`='$username',`email`=' $email',`password`='$password',`mobile`='$mobile',`dob`='$dob',`gender`='$gender',`city`='$city' WHERE id=$id";

        $result=mysqli_query($connect,$q);

        if($result){
            echo"<script>alert('profile updated')
         window.location.href='user.html#!/user_profile'</script>";
    
    
        }
        else{
             echo"<script>alert('error')
             window.location.href='user.html#!/user_profile'</script>";
        
            }
}
?> 
                    
                </dd>
            </div>
        </dl>
    </div>
</div>

    <!-- temp -->


       
        
        </center>
    </form>
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
  
</main>
<!-- End Main -->

</div>

<!-- Scripts -->
<!-- ApexCharts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>

<!-- temp -->

    <!-- temp -->

    
    
        
            <center>

                <div>
                    <?php
                    include('db.php');
                    $q = "SELECT * FROM `category`";
                    $r = mysqli_query($connect, $q);
                    $totalCategories = mysqli_num_rows($r);
                    $qu = "SELECT * FROM `product`";
                    $re = mysqli_query($connect, $qu);
                    $totalProducts = mysqli_num_rows($re);
                    $que = "SELECT * FROM `registration`";
                    $res = mysqli_query($connect, $que);
                    $totalUsers = mysqli_num_rows($res);
                    $quer = "SELECT * FROM `seller`";
                    $resu = mysqli_query($connect, $quer);
                    $totalSeller = mysqli_num_rows($resu);
                    ?>
                    <center>

                        


                </div>
            </center>
        </div>
    </div>
</body>

</html>