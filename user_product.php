<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="userhome.css" >
    <script src="https://cdn.tailwindcss.com"></script>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <?php
    
    session_start();
    ?>
    <style>
        /* Add your CSS styling here */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .search-bar {
            width: 50%;
            margin: 0 auto;
            /* padding: 10px; */
            border-radius: 25px;
            /* Adds rounded corners */
            background-color: #f2f2f2;
            text-align: center;
        }

        .search-bar input[type="text"] {
            width: 80%;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 25px;
            /* Adds rounded corners to the input field */
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 25px;
            /* Adds rounded corners to the button */
            cursor: pointer;
        }

        .product-container {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
        }

        .product-image {
            max-width: 300px;
            height: auto;
            margin-right: 20px;
        }

        .product-description {
            flex: 1;
        }

        .product-price {
            font-weight: bold;
            color: #007bff;
        }

        .star-rating {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .star-rating span {
            color: orange;
            margin-right: 5px;
        }

        .star-rating {
            color: #f0ad4e;
            /* Yellow color for stars */
            font-size: 24px;
            /* Increase star size */
        }
    </style>
</head>

<body class="font-[Poppins]  h-full w-full bg-slate-300" style="">


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
    
   <br><br> <div class="search-bar">
        <!-- Add your search form here -->
        <form action="user_home.php" method="post">
            <input type="text" name="dis" placeholder="Search" required
                class="  border-none  px-4 py-1 text-gray-900 outline-none focus:outline-none  w-96  shadow-xl">
            <button type='submit' name='search' class='m-2 rounded bg-teal-800 px-4 px-2 text-white'>Go</button>
            <?php
            if (isset ($_POST['search'])) {
                $search = $_POST['dis'];
                echo "<script>
                window.location.href='user_product.php?id=$search'</script>";
            }
            ?>
        </form>
    </div>
    <br /><br>
    <?php
    require ('db.php');

    // Retrieve product information from the database 
    $productId = $_GET['id'] ?? "";
    $s = metaphone($productId);
    $search = "$s"; // Get product ID from the URL parameter
    $sql = "SELECT * FROM product WHERE search like '%$search%'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="product-container">
                <a href="product_review.php?id=<?php echo $row['id']; ?>">
                    <img class="product-image" src="<?php echo $row['image']; ?>" alt="<?php echo $row['product']; ?>">
                </a>
                <div class="product-description">
                    <h2>
                        <?php echo $row['product']; ?>
                    </h2>
                    <p>
                        <?php echo $row['discription']; ?>
                    </p>
                    <p class="product-price"> ₹
                        <?php echo $row['price']; ?>
                    </p>
                    <div class="star-rating">
                        <?php
                        $sql = "SELECT AVG(rating) AS avg_rating FROM review WHERE product_id = '$row[id]'";
                        $res = mysqli_query($connect, $sql);
                        if ($res) {
                            $rowa = mysqli_fetch_assoc($res);
                            $avgRating = round($rowa['avg_rating'] ?? 3, 1);
                        } else {
                            $avgRating = 3;
                        }
                        echo '<div class="star-rating">';

                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $avgRating) {
                                echo "<span>&#9733;</span>"; // Full star
                            } else {
                                echo "<span>&#9734;</span>"; // Empty star
                            }
                        }
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='product-container'>Product not found.</div>";
    }

    $connect->close();
    ?>
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