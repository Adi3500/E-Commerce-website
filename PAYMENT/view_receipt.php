<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php
// Retrieve the filename from the URL parameter
session_start();
$user=$_SESSION['user']??"";
$id=$_GET['id'];
$time=$_GET['time'];
$date=$_GET['date'];
$connect=mysqli_connect("localhost","root","","project");

$sql="SELECT * FROM `order` WHERE username='$user'and date='$date' and  time='$time' " ;
$result=mysqli_query($connect,$sql);

$filename = $_GET['filename'] ?? '';
if(mysqli_num_rows($result)> 0){
    while($row=mysqli_fetch_array($result)){
        echo "<table border = 1 class='border-collapse border-separate border-spacing-2 border border-slate-500'>
        <tr>
            <th class='border border-slate-600'>Product name :</th>
            <td class='border border-slate-700'>" . $row['product'] . "</td>
            <td rowspan='13'><img src='" . $row["image"] . "'alt='Custom Image' width=300px></td>
        </tr>,
        <tr>
        <th class='border border-slate-700'>Category:</th>
        <td class='border border-slate-700'> " . $row['category'] . "</td>
    </tr>,
        
        <tr>
            <th class='border border-slate-700'>Product Discription :</th>
            <td class='border border-slate-700'> " . $row['discription'] . "</td>
        </tr>,";
       if ($row['category'] == 't shirt' || $row['category'] == 'hoodies') {

       echo" <tr>     
        <th class='border border-slate-700'>Size :</th>
        <td class='border border-slate-700'> " . $row['size'] . "</td>
    </tr>,";
       }
       else{
        echo" <tr>     
        <th class='border border-slate-700'>Material :</th>
        <td class='border border-slate-700'> " . $row['material'] . "</td>
    </tr>,";
       }
           echo" <th class='border border-slate-700'>Quantity :</th>
            <td class='border border-slate-700'> " . $row['quantity'] . "</td>
        </tr>,
        <tr>
            <th class='border border-slate-700'>Username:</th>
            <td class='border border-slate-700'> " . $row['username'] . "</td>
        </tr>,
        <tr>
            <th class='border border-slate-700'>seller name:</th>
            <td class='border border-slate-700'> " . $row['sellername'] . "</td>
        </tr>,
        <tr>
        <th class='border border-slate-700'>seller Contact:</th>
        <td class='border border-slate-700'> " . $row['seller_contact'] . "</td>
    </tr>,
   
        <tr>
            <th class='border border-slate-700'>Address:</th>
            <td class='border border-slate-700'> " . $row['user_address'] . "</td>
        </tr>,
        <tr>
        <th class='border border-slate-700'>Contact:</th>
        <td class='border border-slate-700'> " . $row['user_contact'] . "</td>
    </tr>,
    <tr>
    <th class='border border-slate-700'>Payment Date:</th>
    <td class='border border-slate-700'> " . $row['date'] . "</td>
</tr>,
<tr>
    <th class='border border-slate-700'>Payment Time:</th>
    <td class='border border-slate-700'> ".$row['time']."</td>
</tr>,
<tr>
    <th class='border border-slate-700'>Price:</th>
    <td class='border border-slate-700'>".$row['price']."</td>
</tr>,
        </table>";
        
    }
}
else{
    echo"hii";
}
if ($filename) {
    // Read the content of the receipt file
    $receipt_content = file_get_contents($filename);

    // Display only the download link on the page
    // echo "<div class='px-4'><div class='text-2xl'> <div><br><a class='text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800' href='$filename' download>Download Receipt</a></div>";
} else {
    // Handle the case where the filename is not provided
    echo "Invalid request.";
}
?>

</body>
</html>