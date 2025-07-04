<!DOCTYPE html>
<html>

<head>
    <title>T-shirt Customization</title>


    <link rel="stylesheet" href="userhome.css" >
    <script src="https://cdn.tailwindcss.com"></script>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <?php
    session_start();
    if (!isset($_SESSION['user'])) {
        echo " <center><h2 style='color:red; border= 2px solid red;'; text-align: center;>Oops! you have to Loging First
    <a href='login.php'>login</a></h2></center>";
        //header('Location: login.php');
        exit();

    }
    ?>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('design-preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <style>
        #design-preview {
            border: solid black;
        }
    </style>
</head>

<body class="font-[Poppins]  h-full w-full bg-slate-300">
    
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

<center>
<div class="py-6">
    <div class="card shadow-lg p-6 bg-white w-2/4">
        <?php
        include("db.php");
        $username = $_SESSION['user'];
        $sql = "SELECT * FROM `custom` where username='$username'";
        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);

        if ($num > 0) {
            echo "<p class='capitalize' style='color: #4CAF50;'>You can check your custom order details <a class='text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-1 inline-block' href='user_custom_detail.php'>here</a>.</p>";
        }
        ?>
        <h2 class="font-bold text-3xl py-4">T-shirt Customization</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="design" class="font-bold">Upload Design Image:</label><br>
            <img id="design-preview" src="image/download.jpeg" alt="Uploaded Image" name="img" height="100px" width="120px" style="border: solid black 1px;"><br>
            <input type="file" name="design_image" id="image" accept="image/*" onchange="previewImage(event)"/><br><br>

            <label for="color" class="font-bold">Enter T-shirt Color:</label><br>
            <input type="text" name="color" id="color" placeholder="Enter color" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>

            <label for="fabric" class="font-bold">Choose Fabric:</label><br>
            <select name="fabric" id="fabric" class="border border-gray-300 text-gray-900 text-sm rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Polyester">Polyester</option>
                <option value="Rayon">Rayon</option>
                <option value="Cotton">Cotton</option>
                <option value="Linen">Linen</option>
                <option value="Jersey">Jersey</option>
                <option value="T-shirt Lycra Fabric">T-shirt Lycra Fabric</option>
                <option value="Nylon">Nylon</option>
            </select><br>

            <label class="font-bold">Select Side for Printing:</label><br>
            <input type="radio" name="print" value="front"> Front
            <input type="radio" name="print" value="back"> Back<br><br>

            <label for="size" class="font-bold">Select Size:</label><br>
            <select name="size" class="border border-gray-300 text-gray-900 text-sm rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select><br>

            <label for="type" class="font-bold">Select T-shirt Type:</label><br>
            <select name="type" class="border border-gray-300 text-gray-900 text-sm rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="Hoodie">Hoodie</option>
                <option value="Full-sleeve T-shirt">Full-sleeve T-shirt</option>
                <option value="Sport T-shirt">Sport T-shirt</option>
                <option value="Half Sleeve">Half Sleeve</option>
            </select><br>

            <label class="font-bold">Select T-shirt Collar Type:</label><br>
            <input type="radio" name="neck" value="Round Neck"> Round Neck
            <input type="radio" name="neck" value="V-neck"> V-neck<br><br>

            <label for="quantity" class="font-bold">Quantity:</label><br>
            <input type="number" name="quantity" id="quantity" min="10" value="10" placeholder="Enter quantity" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-1/2 p-2.5 dark:border-gray-600 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"><br>

            <input type="submit" value="Submit" name="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        </form>
    </div>
</div>
</center>


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
    <?php

if (isset($_POST["submit"])) {
    $image_name = $_FILES['design_image']['name'];
    $image_ext = $_FILES['design_image']['type'];
    $image_tmp = $_FILES['design_image']['tmp_name'];
    $image_size = $_FILES['design_image']['size'];
    $folder = "image/";
    if (strtolower($image_ext) == "image/jpg" || strtolower($image_ext) == "image/jpeg" || strtolower($image_ext) == "image/png" || strtolower($image_ext) == "image/webp" ) {
        $folder = $folder . $image_name;
        $qe="SELECT * FROM `registration` WHERE username='$username'";
$re = mysqli_query($connect, $qe);
$ra = mysqli_fetch_array($re);
$user_contact= $ra["mobile"];
$user_address= $ra["address"];
$user_email= $ra["email"];
$user_name= $ra["name"];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $print = $_POST['print'];
        $type = $_POST['type'];
        $neck = $_POST['neck'];
        $seller = "---";
        $seller_contact="---";
        $seller_email= "---";
        $price = "---";
        $status = "pending";
        $quantity = $_POST["quantity"];
        $fabric = $_POST['fabric'];
        move_uploaded_file($image_tmp, $folder);
        $sql = "INSERT INTO `custom`(`username`, `seller_name`, `design`, `side`, `size`, `colour`, `fabric`, `type`, `neck_design`, `quantity`, `price`, `status`, `user_contact`, `user_email`,`seller_contact`,`seller_email`,`user_address`) VALUES ('$username','$seller','$folder','$print','$size','$color','$fabric','$type','$neck','$quantity','$price','$status','$user_contact','$user_email','$seller_contact','$seller_email','$user_address')";
        $result = mysqli_query($connect, $sql);
        if ($result) {
            echo "<script>alert('data uploaded')
              </script>";


        } else {
            echo "<script>alert('error')
</script>";

        }
    }
    else{
        echo "<p style='color:red';>*please select jpeg or png or jpg file </p>";
    }
}


?>
    
    
    