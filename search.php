<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('connection.php');
    $query = "select * from priyanshu";
    if(isset($_GET['searchbtn'])){
        $searchby = $_GET['searchlist'];
        $searchtxt = $_GET['search'];
        if($searchby == 'id'){
            $query = "select *from priyanshu where id = '$searchtxt'";
        }
        elseif($searchby == 'name'){
            $query = "select *from priyanshu where name = '$searchtxt'";
        }
        elseif($searchby == 'phone'){
            $query = "select *from priyanshu where phone = '$searchtxt'";
        }
        elseif($searchby == 'email'){
            $query = "select *from priyanshu where email = '$searchtxt'";
        }
        else{
            echo"<script>alert('please select the field');</script>";
                }
    }

    $row = mysqli_query($con,$query);
    $totalrows=mysqli_num_rows($row);
    if($totalrows != 0){

 
    
    
    
    ?>
    <form action="" method="GET">
    <select name="searchlist" id="">
        <option value="id">id</option>
        <option value="name">name</option>
        <option value="phone">phone</option>
        <option value="email">email</option>
    </select>
    <input type="text" name="search">
    <input type="submit" name="searchbtn" value="search">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>Phone</th>
            <th>Email</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php
        while($data = mysqli_fetch_assoc($row)){
            echo "<tr>
            <td>".$data['id']."</td>
            <td>".$data['name']."</td>
            <td>".$data['phone']."</td>
            <td>".$data['email']."</td>
            <td><a href='update.php?id = $data[id]'>edit</a></td>
            <td><a href='delete.php?id = $data[id]' onclick = 'return configuration()'>delete</a></td>
           
            
            
            
            </tr>";
        }

           }
        ?>
    </table>
    <script>
        function configuration(){
            return confirm('are you sure!!');
        }
    </script>
</body>
</html>