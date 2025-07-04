//delete.php
<?php
include('db.php');
 
$message = '';
 
$data = json_decode(file_get_contents("php://input"));
$id = $data->id;  
$query = "DELETE FROM tbl_user WHERE userid='$id'";  
 
$statement = $connect->prepare($query);
if($statement->execute())
{
 $message = 'Data Deleted';
}else{
  $message = 'Error';   
}   
echo $message;
?>
