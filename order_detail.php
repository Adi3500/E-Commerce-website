<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Details</title>
  <style>
    /* Basic styling for order details */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f9f9f9;
    }

    h1 {
      text-align: center;
    }

    /* Style for delivery address card */
    .delivery-address-card {
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 20px;
    }

    /* Style for product card */
    .product-card {
      border: 1px solid #ccc;
      display: flex;
      padding: 20px;
      margin-bottom: 20px;
    }

    /* Style for user information */
    .user-info {
      font-weight: bold;
      margin-bottom: 10px;
    }

    /* Style for product image */
    .product-image {
      margin-right: 20px;
      flex: 0 0 200px; /* Fixed width for the image */
    }

    .product-image img {
      width: 100%;
      height: auto;
    }

    /* Style for product details */
    .product-details {
      flex-grow: 2; /* Adjusted flex-grow to occupy more space */
    }

    .product-details div {
      margin-bottom: 5px;
    }

    .product-details .name {
      font-weight: bold;
    }

    /* Basic styling for order tracking */
    .order-tracking {
      border: 1px solid #ccc;
      padding: 20px;
      background-color: #f9f9f9;
    }

    .order-tracking h2 {
      margin: 0;
      color: purple;
    }

    .order-tracking .blue-tick {
      color: blue;
    }

    .order-tracking .blue-dot {
      width: 10px; /* Adjust size as needed */
      height: 10px; /* Adjust size as needed */
      background-color: blue;
      border-radius: 50%; /* Ensures the dot is circular */
      display: inline-block; /* Makes the dot inline with text */
      margin-right: 10px;
    }
    
  </style>
</head>
<body>
  <h1>Order Details</h1>
  <div class="container">
    <?php
    // Database connection
    include('db.php');
    session_start();
    $user = $_SESSION['user'];
    
    // Check connection
    if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
    }

    // Check if product_id is provided in the URL
    if (isset($_GET['product_id'])) {
      $product_id = $_GET['product_id'];

      // Retrieve order details from the database
      $sql = "SELECT * FROM `order` WHERE id = $product_id and username='$user'";
      $result = $connect->query($sql);

      // Output delivery address in a card
      if ($result !== false && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='delivery-address-card'>";
        echo "<div class='user-info'>Delivery Address:</div>";
        echo "<div>" . $row["user_address"] . "</div>";
        echo "<br><div class='user-info'>Phone number:</div>";
        echo "<div>" . $row["user_contact"] . "</div>";
        echo "</div>";

        // Display product card
        echo "<div class='product-card'>";
        // Product image
        echo "<div class='product-image'>";
        echo "<img src='" . $row["image"] . "' alt='Product Image'>";
        echo "</div>";
        // Product details
        echo "<div class='product-details'>";
        echo "<div class='name'>Name: " . $row["product"] . "</div>";
        echo "<div>" . $row["discription"] . "</div>";
        echo "<div>Size: " . $row["size"] . "</div>";
        echo "<div>Quantity: " . $row["quantity"] . "</div>";
        echo "<div>Price: $" . $row["price"] . "</div>";
        echo "</div>";

        // End of product card
        echo "</div>";

        // Shipping tracker
        echo "<div class='order-tracking'>";
        echo "<h2>Order Tracking</h2>";

        // Fetch order details from the database
        $sql = "SELECT * FROM `order` where id='$product_id' and username='$user'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
          // Output data of each row
          while ($row = $result->fetch_assoc()) {
            if ($row['status'] == "") {
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER SUCCESSFULLY</h2></div></br>";
              echo "<span class='blue-dot'>    </span>ORDER SHIPPED</br></br>";
              echo "<span class='blue-dot'></span>ORDER OUT FOR DELIVERY</br></br>";
              echo "<span class='blue-dot'></span>ORDER DELIVERED SUCCESSFULLY</br>";
            }
            if ($row['status'] == "shipped") {
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER SUCCESSFULLY</h2></div></br>";
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER SHIPPED</h2></div></br>";
              echo "<span class='blue-dot'></span>ORDER OUT FOR DELIVERY</br></br>";
              echo "<span class='blue-dot'></span>ORDER DELIVERED SUCCESSFULLY</br>";
            }
            if ($row['status'] == "out for delivery") {
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER SUCCESSFULLY</h2></div></br>";
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER SHIPPED</h2></div></br>";
              echo "</br><div class='blue-tick'>&#10004;</span>ORDER OUT FOR DELIVERY</h2></div></br>";
              echo "<span class='blue-dot'></span>ORDER DELIVERED SUCCESSFULLY</br>";
            }
          }
        }
        echo "</div>"; // End of order-tracking
      } else {
        echo "No product ID provided in the URL";
      }
    }
    $connect->close();
    ?>
  </div>
</body>
</html>
