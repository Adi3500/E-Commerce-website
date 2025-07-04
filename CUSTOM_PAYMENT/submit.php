<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

session_start();
$username = $_SESSION['user'];

$connect = mysqli_connect("localhost", "root", "", "project");
$id = $_GET['id'] ?? "";

$sql = "SELECT * FROM CUSTOM WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($result);
$design=$row['design'];
$size=$row['size'];
$quantity=$row['quantity'];
$color=$row['colour'];
$type=$row['type'];
$fabric=$row['fabric'];
$neck_design=$row['neck_design'];
$price=$row['price'];
$seller=$row['seller_name'];
$side=$row['side'];
$q="SELECT * FROM `seller` WHERE sellername='$seller'";
$r = mysqli_query($connect, $q);
$ro = mysqli_fetch_array($r);
$seller_contact= $ro[5];
$seller_email=$ro['email'];
$qe="SELECT * FROM `registration` WHERE username='$username'";
$re = mysqli_query($connect, $qe);
$ra = mysqli_fetch_array($re);
$user_contact= $ra["mobile"];
$user_address= $ra["address"];
$user_email= $ra["email"];
$date= date("Y-m-d");
$time= date("h:i:s");
$status="";
$sqll="INSERT INTO `custom_order`(`custom_id`, `sellername`, `username`, `design`, `user_contact`, `user_email`, `price`, `side`, `size`, `quantity`, `color`, `neck_design`, `fabric`, `type`, `seller_contact`, `seller_email`, `date`, `time`, `user_address`,`status`)
                           VALUES('$id','$seller','$username','$design','$user_contact','$user_email','$price','$side','$size','$quantity','$color','$neck_design','$fabric','$type','$seller_contact','$seller_email','$date','$time','$user_address','$status')";
$results=mysqli_query($connect,$sqll);
$query="DELETE FROM `custom` WHERE id=$id";
$query_result=mysqli_query($connect,$query);
require("./config.php");

// Disable SSL certificate verification for Stripe
\Stripe\Stripe::setVerifySslCerts(false);

// Get the Stripe token from the submitted form
$token = $_POST['stripeToken'];

try {
    // Create a charge using Stripe API
    $data = \Stripe\Charge::create([
        'amount' => $price * 100, // Stripe requires the amount in cents
        'currency' => 'inr',
        'description' => 'Shopflix - ' . $type,
        'source' => $token,
        // You can include other parameters as needed...
    ]);

    // Generate receipt content
    $receipt_content = "Receipt for Order\n";
    $receipt_content .= "Type: $type\n";
    $receipt_content .= "Price: ₹$price\n";
     //$receipt_content .= "Delivery Charge: ₹$del_charge\n";
     //$receipt_content .= "Total Price: ₹$tot_price\n";
     $receipt_content .= "name: $user_name\n";
     $receipt_content .= "mobile_no: $user_contact\n";
     $receipt_content .= "email: $user_email\n";
     $receipt_content .= "user address: $user_address\n";
     $receipt_content .= "seller name: $seller\n";
     $receipt_content .= "seller contact: $seller_contact\n";
     
    // Save the receipt to a file
    $receipt_filename = "receipt_" . time() . ".txt";
    file_put_contents($receipt_filename, $receipt_content);
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
