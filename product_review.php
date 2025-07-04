<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="userhome.css">
    

    <?php
    session_start();
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        #product_image{
            height: 300px;
            width: 300px;
            align-items: center;
        }

        .container {
            max-width: 1286px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product-detail {
            margin-bottom: 20px;
        }

        .product-detail img {
            max-width: 100%;
            height: auto;
        }

        .similar-products {
            margin-bottom: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .similar-products h2 {
            margin-bottom: 10px;
        }

        .product-card {
            display: flex;
            margin-bottom: 20px;
        }

        .product-card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 20px;
        }

        .product-card .product-info {
            flex: 1;
        }

        .product-card .product-info h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .product-card .product-info p {
            margin: 5px 0;
        }

        .review-section {
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .review-section h2 {
            margin-bottom: 10px;
        }

        .review {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .review .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .review .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .review .user-info {
            flex: 1;
        }

        .review .user-info h3 {
            margin: 0;
            font-size: 16px;
            font-weight: bold;
        }

        .review .user-info .rating {
            display: flex;
            align-items: center;
        }

        .review .user-info .rating .star {
            color: #ff9f00;
            margin-right: 2px;
        }

        .review .user-info .date {
            font-size: 12px;
            color: #777;
        }

        .review .comment {
            margin-top: 5px;
            font-size: 14px;
        }

        .comment {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui;
        }

        h1 {
            color: black;
            /* font-family: cursive; */
            /* text-align: center; */
            font-size: 3rem;
        }

        .chat {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
        }

        .chat h2 {
            font-size: 2rem;
            font-family: cursive;
            text-align: center;
        }

        .msg {
            width: 1168px;
            height: 480px;
            border-top: 1px solid lightgray;
            border-bottom: 1px solid lightgray;
            margin: 1rem auto;
            padding: 1rem 0;
            display: flex;
            flex-direction: column;
            overflow-y: scroll;
        }

        ::-webkit-scrollbar {
            width: 0px;
        }

        .input_msg {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            
            /* Add margin to separate from reviews */
        }

        input[type="text"] {
            width: 70%;
            font-size: 1rem;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            /* Make input box round */
            border: 1px solid #ccc;
        }

        .input_msg button {
            background-color: #171747;
            color: white;
            border: none;
            cursor: pointer;
            padding: 0.5rem 1.2rem;
            font-size: 1rem;
            border-radius: 20px;
            /* Make button round */
        }

        .msg p {
            background-color: rgb(194, 192, 192);
            padding: 0.4rem 1rem;
            width: fit-content;
            border-radius: 5px;
            margin-bottom: 1rem;
        }

        .msg span {
            display: block;
            font-weight: bold;
            opacity: 0.5;
        }

        .msg .sender {
            background-color: rgb(89, 255, 89);
            align-self: end;
        }

        .selected {
            color: gold;
        }

        .star {
            cursor: pointer;
        }

        .ratings {
    /* display: flex; */
    justify-content: center; /* Center the stars horizontally */
    align-items: center; /* Center the stars vertically */
    font-size: 36px; /* Increase star size */
    margin-bottom: 10px; /* Add some space between stars and input box */
}

.ratings .star {
    color: #ccc;
    cursor: pointer;
    margin-right: 10px; /* Add space between stars */
}

.ratings .star.selected {
    color: gold;
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
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f4f4f4;
            padding: 20px;
            text-align: center;
            box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.1); /* Add shadow to footer */
        }

        .footer button {
            padding: 10px 20px;
            background-color: #171747;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .similar-products{
            display: flex;
            
        }
        .flexw{
            display: flex;
        }
    </style>
</head>

<body>

        <!-- temp -->

        
        

        <!-- temp -->

    <form method="post">
    <div class='container'>
        <div class='product-detail'>
            <?php


            require('db.php');


            // Retrieve product information from the database 
            $productId = $_GET['id'] ?? ""; // Get product ID from the URL parameter
            $sql = "SELECT * FROM product WHERE id=$productId";
            $result = mysqli_query($connect, $sql);







            while ($row = mysqli_fetch_array($result)) {
                
                $stock=$row['quantity'];
                
                
                
                
                echo "
                <div class='bg-gray-100 dark:bg-gray-800 py-8'>
                <div class='max-w-6xl mx-auto px-4 sm:px-6 lg:px-8'>
                <div class='flex flex-col md:flex-row -mx-4'>
                <div class='md:flex-1 px-4'>
<img id='product_image' src='$row[image]' alt='Product Image'></br>
<div class=''>
<div class=''>
            <div class='flexw'>
            <div class='w-1/2 px-2'><button class='w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700' name='atc'>Add to Cart</button></div>
            <div class='w-1/2 px-2'><button class='w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600' name='buy'>Buy Now</button></div>
                </div>

</div>
</div>
</div>

<div class='px-8'>




<div class='md:flex-1 px-8'>
       
<h1 class='capitalize'>$row[product]</h1>
        <p class='uppercase' >$row[discription]</p>
        <h2 style='color:red;'>hurry up! only $row[quantity] pieces are left /--</h2>
        <br><p class='font-bold text-2xl'>Price: <span style='color:blue'>₹$row[price]</span></p><br>";
        echo"<lable>quantity</lable>
        <input type='number' name='quantity' value='1' min='1' max=$stock/>";
        if(isset($_POST['buy'])){
            if ($row['category'] == 't shirt' || $row['category'] == 'hoodies') {
            $size=$_POST['size'];
            $material="";
            }
            else{
                $size="";
                 $material=$_POST['material'];
            }
            $quantity=$_POST['quantity'];
            if(!isset($_SESSION['user'])){
        echo"<script>alert('please login first')</script>";
    } 
    else{
        if($quantity>$stock){
            echo"<span style='color:red'>*out of stock </span>";
        }
        else{
        echo"<script>
        window.location.href='buy_product.php?id=$row[id]&quantity=$quantity &size=$size &material=$material'</script>";
        }
    }
}
if(isset($_POST['atc'])){
    if ($row['category'] == 't shirt' || $row['category'] == 'hoodies') {
        $size=$_POST['size'];
        $material="";
        }
        else{
            $size="";
            $material=$_POST['material'];
        }
        $quantity=$_POST['quantity'];
        if(!isset($_SESSION['user'])){
    echo"<script>alert('please login first')</script>";
} 
else{
    if($quantity>$stock){
        echo"<span style='color:red'>*out of stock </span>";
    }
    else{
        $username=$_SESSION['user'];
        $t_price=$row['price']*$quantity;
        $query="INSERT INTO `atc`( `product_id`,`product`, `discription`, `username`, `price`, `image`,`size`,`quantity`,`material`,`t_price`,`category`) VALUES ('$row[id]','$row[product]','$row[discription]','$username','$row[price]','$row[image]','$size','$quantity','$material','$t_price','$row[category]')";
        $resul=mysqli_query($connect,$query);
        if($resul){
            echo"<script>alert('product is added to your add_to_cart')</script>";
        }
    }
}
    
}
    
                if ($row['category'] == 't shirt' || $row['category'] == 'hoodies') {

                    echo ' <br><div style="" ><label for="size">Select size:</label>
        <select name="size" id="color" style=" " class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            <option value="XXL">XXL</option>
        </select><br/> </div></div> </div></div></div>';

                }
               else{
                echo ' <br><div style="" ><label for="size">Select Material:</label>
        <select name="material" id="color" style=" " class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="matel">matel</option>
            <option value="rubber">rubber</option>
            
        </select><br/> </div></div> </div></div></div>';
               }
        
    
    
    
            } 
            ?>
        </div>
        <!-- similar products -->
       <br><br> <center><h2 class="font-bold text-2xl">Similar Products</h2></center><br>
        <div class="similar-products">
            <?php
            // Fetch similar products from the database
            $similarProductsQuery = "SELECT * FROM product WHERE category = (SELECT category FROM product WHERE id = $productId) AND id != $productId LIMIT 4";
            $similarProductsResult = mysqli_query($connect, $similarProductsQuery);

            // Display similar products
            while ($row = mysqli_fetch_array($similarProductsResult)) {
                echo '<div class="flex-row group my-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">';
                
                echo "<div style='height:350px;'><a class='' href='product_review.php?id=$row[id]'><img src='$row[image]' height='400px' alt='Product Image' class='p-8 px-10 rounded-t-lg '></a></div>";
                echo '<div class="mt-4 px-5 pb-5 rounded-lg">';
                echo'';
                echo '<h5 class=" uppercase text-xl tracking-tight text-slate-900">' . $row['product'] . '</h5>';
                echo'<br>';
                echo '<p  style="height:100px">' . $row['discription'] . '</p>';
                echo'<div class="mt-2 mb-5 flex items-center justify-between">';
                echo '<p class="" >Price:<span style="color:blue;">₹ ' . $row['price'] . '</span></p>';
                echo'</div>';
                echo '</div>';
                echo '</div>';
                
            }
            ?>
        </div>
        <!-- review area -->
        <div class="px-8">
        <h2>Rating and Review part</h2>
        <div class="star-rating">
            <?php
            $sql = "SELECT AVG(rating) AS avg_rating FROM review WHERE product_id = '$productId'";
            $res = mysqli_query($connect, $sql);
            if ($res) {
                $rowa = mysqli_fetch_assoc($res);
                $avgRating = round($rowa['avg_rating'] ?? 3, 1);
            } else {
                $avgRating = 3;
            }
            echo "<p  style='color:black;'>Average Rating:<span> $avgRating &#9733;</span></p>";
            echo "</br>";
            echo "</br>";
            echo "</br>";
            ?>
        </div>
        <h2 class="font-bold text-2xl ">You Can Give Rating And Review here:</h2></div>
        <div class="comment">
        <div class="chat">
            <div id="focus"></div>
            <div class="ratings">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div><br>
            <input type="hidden" name="rating" id="rating">
            <div class="input_msg">
                <input class="" type="text" name="msg" placeholder="add your review">
                <button name="send">Send</button>
            </div>
        </div>
                    <div class="msg">
                        <?php

                        $username = $_SESSION['user'] ?? "";
                        $con = mysqli_connect("localhost", "root", "", "project");
                        $f = "SELECT * FROM `review` WHERE `product_id`='$productId'";
                        $g = mysqli_query($con, $f);
                        $n = mysqli_num_rows($g);
                        if ($n > 0) {


                            while ($row = mysqli_fetch_array($g)) {
                                $rating = intval($row['rating']);
                                $stars = str_repeat('&#9733;', $rating); // Unicode for star character
                                $emptyStars = str_repeat('&#9734;', 5 - $rating); // Unicode for empty star character
                                if ($row["3"] == $username) {
                                    echo "<p class='sender'>your<span class='rating'>$stars$emptyStars</span><span>$row[1]</span></p>";
                                } else {
                                    echo "<p>$row[3]<span class='rating'>$stars$emptyStars</span><span>$row[1]</span></p>";
                                }
                            }
                        }

                        if (isset($_POST['send'])) {
                            $msg = $_POST['msg'];
                            $rating = $_POST['rating'];

                            $query = "INSERT INTO `review`(`comment`, `rating`, `username`, `product_id`) VALUES ('$msg','$rating','$username','$productId')";
                            $r = mysqli_query($con, $query);
                            $f = "SELECT * FROM `review` ORDER BY id DESC LIMIT 1";
                            $g = mysqli_query($con, $f);
                            $no = mysqli_num_rows($g);
                            $s = "SELECT * FROM `review` where `product_id`='$productId'";
                            $y = mysqli_query($con, $s);
                            $n = mysqli_num_rows($y);
                            while ($row = mysqli_fetch_array($g)) {
                                if ($row["3"] == $username) {
                                    echo "<p class='sender' id='display'>your<span>$row[2]</span><span>$row[1]</span></p>";
                                } else {
                                    echo "<p>$row[3]<span>$row[1]</span><span>$row[2]</span></p>";
                                }
                                if ($n > 10) {
                                    $conn = mysqli_connect("localhost", "root", "", "chat_bot");

                                    $d = "DELETE FROM `review` LIMIT 5";
                                    $de = mysqli_query($conn, $d);
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
           
    $connect->close();
    ?>
</form>
<script>
    function onPageLoad() {
        var messageContainer = document.querySelector('.msg');
        messageContainer.scrollTop = messageContainer.scrollHeight;
        document.querySelector('input[name="msg"]').focus();
    }
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        stars.forEach(star => {
            star.addEventListener('click', function () {
                const value = parseInt(this.getAttribute('data-value'));
                document.getElementById('rating').value = value;
                stars.forEach(s => s.classList.remove('selected'));
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('selected');
                }
                });
            });
        });
    </script>

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
