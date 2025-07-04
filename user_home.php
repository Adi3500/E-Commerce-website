
<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    ?>
    <title>Home Page</title>
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

</head>
<body class="font-[Poppins]  h-full w-full bg-slate-300" style="">


    <!-- navbar -->
    
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



    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>
    <!-- navbar -->
<br>

    <div id="home-body" class="py-10">
    <div class="search-bar">
        <!-- Add your search form here -->
        <form action="user_home.php" method="post">
           <input type="text" name="dis" placeholder="Search" required class="  border-none  px-4 py-1 text-gray-900 outline-none focus:outline-none  w-96  shadow-xl">
            <button type='submit' name='search' class='m-2 rounded bg-teal-800 px-4 px-2 text-white'>Go</button> 
            <?php
            if(isset($_POST['search'])){
                $search = $_POST['dis'];
                echo "<script>
                window.location.href='user_product.php?id=$search'</script>";
            }
                
            // $search=$_POST["query"]??"";
            // include('db.php');
            // $query="SELECT * FROM `category` WHERE category='$search'";          
            // $result=mysqli_query($connect,$query);
            // $num=mysqli_num_rows($result);
            // if($num>0){
                
            //     echo "<script>
            //     window.location.href='user_category.php?id=$search'</script>";

            //    // header('Location: user_category.php?name=$search');
            // }
            // else
            // {
            // $query="SELECT * FROM `product` WHERE product='$search'";
            // $result=mysqli_query($connect,$query);
            // $num=mysqli_num_rows($result);

            // if($num>0){
                
            //     echo "<script>
            //     window.location.href='user_product.php?id=$search'</script>";

            //    // header('Location: user_category.php?name=$search');
            // }
            // else{
            //     echo "<script>alert('please! select category')
            //     window.location.href='user.html#!/'</script>";
            // }
            // }
        // }
            
            ?>
        </form>
    </div>
    <br/><br>
    <center><h2 class="text-4xl font-bold dark:text-black shadow-red-600 " style="">Types of <span class="auto-type text-white bg-blue-600 rounded dark:bg-blue-500 shadow-lg shadow-indigo-500/40"><mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500 shadow-lg shadow-indigo-500/40">Merchandise</mark></span></h2></center>

    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>


    <script>

        var typed = new Typed(".auto-type",{
            strings: ["Merchandise"],
            typeSpeed: 200,
            backSpeed: 150,
            loop: true
        })

    </script>
<br>
    <div class="category-block">
        <!-- Add category images here -->
        <div><a href='user_category.php?id=t shirt'><img  class="category-image shadow-xl " src="image/images.png" /></a><h2 style="text-align:center; text-shadow: 12px -24px 20px;" class="font-mono font-bold font-mono font-bold shadow-lg shadow-black bg-slate-800 px-6 py-2 border-sky-500 rounded-full ">T shirt</h2></div>
        <div><a href='user_category.php?id=hoodies'><img  class="category-image shadow-xl" src="image/gojo1.png" /></a><h2 style=" text-align:center;" class="font-mono font-bold shadow-lg shadow-black bg-slate-800 px-6 py-2 border-sky-500 rounded-full">Hoodiies</h2></div>
        <div><a href='user_category.php?id=key chain'><img  class="category-image shadow-xl" src="image/zoro sword.jpg" /></a><h2 style=" text-align:center;" class="font-mono font-bold shadow-lg shadow-black bg-slate-800 px-6 py-2 border-sky-500 rounded-full">Key Chain</h2></div>
        <div><a href='user_category.php?id=necklace'><img  class="category-image shadow-xl" src="image/nacklace.png" /></a><h2 style=" text-align:center;" class="font-mono font-bold shadow-lg shadow-black bg-slate-800 px-6 py-2 border-sky-500 rounded-full">NeckLace</h2></div>
        <div><a href='user_category.php?id=shirt'><img  class="category-image shadow-xl" src="image/tshirt.png" /></a><h2 style=" text-align:center;" class="font-mono font-bold shadow-lg shadow-black bg-slate-800 px-6 py-2 border-sky-500 rounded-full">shirt</h2></div>

        <!-- Add more categories as needed -->
    </div>
    

        
    
    <center>
    
    <h1 style="" class="underline underline-offset-8  capitalize text-2xl text-black  decoration-white py-14 "> <span class="bg-white px-2 rounded-md">Trending Products</span></h1></center>
    <br/>
    <div class="product-block">
        
        <?php
        
        require('db.php');

        $query = "SELECT * FROM product Where popular='Yes'";
        $result = mysqli_query($connect,$query);

        $Count = 0;
        // PHP loop to display product images
        while ($row = mysqli_fetch_array($result)) {
            if ($Count % 5 === 0) {
                echo '<div class="image-container ">';
            }
            
            echo "<div class='image-card w-full px-20 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-500 p-8 rounded-t-lg'>";
             echo"<div class=''><a href='product_review.php?id=$row[id]'><img src='$row[image]' alt='.$row[product].' class=''></a> </div>";
            echo '<h2 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white capitalize ">' . $row['product'] . '</h2>' ;
            echo" <br> <p class='text-3xl font-bold text-gray-900 dark:text-white '>₹$row[price]</p> ";
            echo "<div class='flex items-center justify-between'>
            <a href='product_review.php?id=$row[id]'' class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>buy now</a>
        </div>";
            echo '</div>';
            
            $Count++;

            if ($Count % 5 === 0) {
                echo '</div>';
            }
        }
        if ($Count % 5 !== 0) {
            echo '</div>';
        }
        ?>
    </div>
    </div>

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
