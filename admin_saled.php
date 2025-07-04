<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.0/xlsx.full.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>


<!-- Custom CSS -->
<link rel="stylesheet" href="css/styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
<style>
  .search-bar button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 25px; /* Adds rounded corners to the button */
    cursor: pointer;
}

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
          <input type="text" name="seller" placeholder="search by seller/user/deliveryboy name" id=""/>
          <button  name="search" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">search</button>
        <div class="login-container">

        <?php
include('db.php');
if(isset($_POST['search'])){
  $search=$_POST['seller'];
  $sql = "SELECT * FROM delivered_product where `sellername`='$search' or `deliveryBoy_username`='$search' or `username`='$search'"; // Selecting all rows from delivered_product table
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
$sqll = "SELECT * FROM custom_delivered where `sellername`='$search' or `deliveryBoy_username`='$search' or `username`='$search'" ; // Selecting all rows from delivered_product table
    $results = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($results)) {
  $totalPrice += $row['price']; // Accumulate total price
    $totalQuantity += $row['quantity']; // Accumulate total quantity
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
        <td>".'---'."</td>
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

}
else{
$sql = "SELECT * FROM delivered_product"; // Selecting all rows from delivered_product table
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
$sqll = "SELECT * FROM custom_delivered " ; // Selecting all rows from delivered_product table
    $results = mysqli_query($connect, $sqll);
while ($row = mysqli_fetch_array($results)) {
  $totalPrice += $row['price']; // Accumulate total price
    $totalQuantity += $row['quantity']; // Accumulate total quantity
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
        <td>".'---'."</td>
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
}
?>






    </tbody>
</table>
</div>
<button id="generateExcelBtn" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          Generate Excel Report
        </button>
</form>
</div>
  
</main>
<!-- End Main -->

</div>

<!-- Scripts -->
<!-- ApexCharts -->
<script>
  document.getElementById('generateExcelBtn').addEventListener('click', function() {
    // Get the table element
    const table = document.querySelector('.w-full');

    // Convert table to Excel workbook
    const wb = XLSX.utils.table_to_book(table);

    // Generate Excel file from workbook
    const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

    // Convert Excel file to Blob
    const blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });

    // Save Blob as file
    const fileName = 'report.xlsx';
    if (navigator.msSaveBlob) { // For IE
      navigator.msSaveBlob(blob, fileName);
    } else {
      const link = document.createElement('a');
      if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);
        link.setAttribute('href', url);
        link.setAttribute('download', fileName);
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
      }
    }
  });

  // Function to convert string to ArrayBuffer
  function s2ab(s) {
    const buf = new ArrayBuffer(s.length);
    const view = new Uint8Array(buf);
    for (let i = 0; i !== s.length; ++i) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
  }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
<!-- Custom JS -->
<script src="js/scripts.js"></script>

<!-- temp -->
</div>


</body>
</html>