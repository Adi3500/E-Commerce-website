<?php
 require 'PHPMailer/PHPMailer.php';
 require 'PHPMailer/Exception.php';
 require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
 // Adjust the path if necessary

session_start();
$username = $_SESSION['user'];

$connect = mysqli_connect("localhost", "root", "", "project");
$id = $_GET['id'] ?? "";
$size = $_GET['size'] ?? "";
$material = $_GET['material'] ?? "";
$quantity = intval($_GET['quantity'] ?? "");
$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$pname = $row['product'];
$pprice = $row['price'];
$dis=$row['discription'];
$category=$row['category'];
$seller=$row['seller_name'];
$stock=$row['quantity'];
$stock=$stock-$quantity;
$del_charge = 50;
$tot_price = ($pprice * $quantity);
$image = $row['image'];
$q="SELECT * FROM `seller` WHERE sellername='$seller'";
$r = mysqli_query($connect, $q);
$ro = mysqli_fetch_array($r);
$seller_contact= $ro[5];
$qe="SELECT * FROM `registration` WHERE username='$username'";
$re = mysqli_query($connect, $qe);
$ra = mysqli_fetch_array($re);
$user_contact= $ra["mobile"];
$user_address= $ra["address"];
$user_email= $ra["email"];
$user_name=$ra["name"];
$date= date("Y-m-d");
$time= date("h:i:s");
$status="";
$sqll="INSERT INTO `order`(`product_id`, `sellername`, `username`, `product`, `discription`, `category`, `price`, `image`, `size`, `quantity`, `user_contact`, `user_address`, `seller_contact`,`date`,`time`,`material`,`t_price`,`del_price`,`status`) VALUES ('$id','$seller','$username','$pname','$dis','$category','$pprice','$image','$size','$quantity','$user_contact','$user_address','$seller_contact','$date','$time','$material','$tot_price','$del_charge','$status')";
$results=mysqli_query($connect,$sqll);
$query="UPDATE `product` SET `quantity`='$stock' WHERE `id`=$id";
$resu=mysqli_query($connect, $query);

// Include the Stripe PHP library
require("./config.php");

// Disable SSL certificate verification for Stripe
\Stripe\Stripe::setVerifySslCerts(false);

// Get the Stripe token from the submitted form
$token = $_POST['stripeToken'];

try {
    // Create a charge using Stripe API
    $data = \Stripe\Charge::create([
        'amount' => $tot_price * 100, // Stripe requires the amount in cents
        'currency' => 'inr',
        'description' => 'Shopflix - ' . $pname,
        'source' => $token,
        // You can include other parameters as needed...
    ]);

    // Generate receipt content
    $receipt_content = "Receipt for Order\n";
    $receipt_content .= "Product: $pname\n";
    $receipt_content .= "Price: ₹$pprice\n";
    $receipt_content .= "Delivery Charge: ₹$del_charge\n";
    $receipt_content .= "Total Price: ₹$tot_price\n";
    $receipt_content .= "username: $username\n";
$receipt_content .= "name: $user_name\n";
$receipt_content .= "mobile_no: $user_contact\n";
$receipt_content .= "email: $user_email\n";
$receipt_content .= "user address: $user_address\n";
$receipt_content .= "seller name: $seller\n";
$receipt_content .= "seller contact: $seller_contact\n";
    // Save the receipt to a file
    $receipt_filename = "receipt_" . time() . ".txt";
    file_put_contents($receipt_filename, $receipt_content);

    // Send email to the user
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'custom47990@gmail.com'; // SMTP username
    $mail->Password = 'fwkz gadd vmgq nhci';
     // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
    $mail->setFrom('custom47990@gmail.com', 'Custom 4'); // Sender's email and name
    $mail->addAddress($user_email, $user_name); // Recipient's email and name
    $mail->Subject = 'Your Order Receipt';
    $mail->Body = $receipt_content; // Use the receipt content generated in your script

    if (!$mail->send()) {
        echo 'Email could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email has been sent.';
    }

    // Redirect to the receipt display page with the filename as a parameter
    header("Location: view_receipt.php?filename=$receipt_filename&id=$id&date=$date&time=$time&user=$username");
    exit();

} catch (\Stripe\Exception\InvalidRequestException $e) {
    // Handle Stripe API exceptions
    echo 'Error: ' . $e->getMessage();
} catch (Exception $e) {
    // Handle other exceptions
    echo 'Error: ' . $e->getMessage();
}
?>
