<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
session_start();
$username = $_SESSION['user'];
$date= date("Y-m-d");
$time= date("h:i:s");
$connect = mysqli_connect("localhost", "root", "", "project");

$sql = "SELECT * FROM atc WHERE username = '$username'";
$result = mysqli_query($connect, $sql);
$n=1;
$total=0;
$del_charge=50;
while($row = mysqli_fetch_array($result)){
$p_id = $row['product_id'];
$size = $row['size'];
$material = $row['material'];
$quantity=$row['quantity'];
$t_price=$row['t_price'];
$qa="SELECT * FROM `product` WHERE id='$p_id'";
$ru = mysqli_query($connect, $qa);
$rw = mysqli_fetch_array($ru);
$pname = $rw['product'];
$dis=$rw['discription'];
$category=$rw['category'];
$seller=$rw['seller_name'];
$image = $rw['image'];
$stock=$row['quantity']-$quantity;
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
$user_name= $ra["name"];
$status="";
$sqll="INSERT INTO `order`(`product_id`, `sellername`, `username`, `product`, `discription`, `category`, `price`, `image`, `size`, `quantity`, `user_contact`, `user_address`, `seller_contact`,`date`,`time`,`material`,`t_price`,`del_price`,`status`) VALUES ('$p_id','$seller','$username','$pname','$dis','$category','$t_price','$image','$size','$quantity','$user_contact','$user_address','$seller_contact','$date','$time','$material','$t_price','$del_charge','$status')";
$results=mysqli_query($connect,$sqll);
$query="UPDATE `product` SET `quantity`='$stock' WHERE `id`=$p_id";
$resu=mysqli_query($connect, $query);
$qu="DELETE FROM `atc` WHERE product_id=$p_id and username='$username'";
$qu_result=mysqli_query($connect,$qu);
if($results){
$total=$total+$t_price;
$receipt_content = "Receipt for Order\n";
$receipt_content .= "Total Product : $n\n";
$receipt_content .= "username: $username\n";
$receipt_content .= "name: $user_name\n";
$receipt_content .= "mobile_no: $user_contact\n";
$receipt_content .= "email: $user_email\n";
$receipt_content .= "user address: $user_address\n";
$receipt_content .= "total Price: ₹$total\n";
$receipt_content .= "seller name: $seller\n";
$receipt_content .= "seller contact: $seller_contact\n";
// Save the receipt to a file
$receipt_filename = "receipt_" . time() . ".txt";
file_put_contents($receipt_filename, $receipt_content);
}
$n=$n+1;
}   

// Include the Stripe PHP library
require("./config.php");

// Disable SSL certificate verification for Stripe
\Stripe\Stripe::setVerifySslCerts(false);

// Get the Stripe token from the submitted form
$token = $_POST['stripeToken'];

try {
    // Create a charge using Stripe API
    $data = \Stripe\Charge::create([
        'amount' => $total * 100, // Stripe requires the amount in cents
        'currency' => 'inr',
        'description' => 'Shopflix - ' . $pname,
        'source' => $token,
        // You can include other parameters as needed...
    ]);

    // // Generate receipt content
    

    // Save the receipt to a file
   
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
