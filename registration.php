<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> -->
    <style>
        .login-container {
            background-color: rgba(0, 0, 0, 0.051);
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 500px;
            text-align: center;
            border-radius: 5px;
        }

        label {
            color: white;
        }
    </style>
</head>

<body style="background: #691806;">
    <br /><br />
    <div class="container" style="width:500px;">
        <div>
            <form action="" method="post">
                <div class="login-container">
                    <img id="preview" src="image/default.jpg" alt="Uploaded Image" name="img" height="100px"
                        width="150px" />
                    <br />
                    <label>image</label>
                    <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)" />

                    <br />
                    <label>name</label>
                    <input type="text" name="name" class="form-control" required />
                    <br />
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required />
                    <br />
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required />
                    <br />
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required />
                    <br />
                    <label>Mobile No.</label>
                    <input type="text" name="mobile_no" class="form-control" required />
                    <br />
                    <label>Date of Birth</label>
                    <input type="date" name="dob" class="form-control" required />
                    <br />
                    <label>Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="" selected>"select gender"</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                    <br />
                    <label>city</label>
                    <select name="city" class="form-control" required>
                        <option value="" selected>"select state"</option>
                        <option value="surat">surat</option>
                        <option value="rajkot">rajkot</option>
                        <option value="vapi">rajkot</option>
                    </select>
                    <br />
                    <?php

                    if (isset($_POST['btnInsert'])) {
                        
                        $username = $_POST['username'];
                        include('db.php');
                        $c="SELECT * FROM `registration` WHERE username='$username'";
                        $r = mysqli_query($connect, $c);
                        if (mysqli_num_rows($r) == 0) {
                        $c="SELECT * FROM `seller` WHERE sellername='$username'";
                            $r = mysqli_query($connect, $c);
                            if (mysqli_num_rows($r) == 0) {
                        $c="SELECT * FROM `login` WHERE username='$username'";
                        $r = mysqli_query($connect, $c);
                            if (mysqli_num_rows($r) == 0) {
                        

                        if (isset($_FILES['image'])) {

                            $image_name = $_FILES['image']['name'];
                            $image_ext = $_FILES['image']['type'];
                            $image_tmp = $_FILES['image']['tmp_name'];
                            $image_size = $_FILES['image']['size'];
                            $folder = "image/";
                            if (strtolower($image_ext) == "image/jpg" || strtolower($image_ext) == "image/jpeg" || strtolower($image_ext) == "image/png") {
                                $folder = $folder . $image_name;
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];

                                $mobile = $_POST['mobile_no'];
                                $dob = $_POST['dob'];
                                $gender = $_POST['gender'];
                                $city = $_POST['city'];
                                move_uploaded_file($image_tmp, $folder);

                                $query = "INSERT INTO `registration`( `name`, `username`, `email`, `password`, `mobile`, `dob`, `gender`, `city`,`image`) VALUES ('$name','$username','$email','$password','$mobile','$dob','$gender','$city','$folder')";

                                $result = mysqli_query($connect, $query);

                                if ($result) {
                                    echo "<script>alert('data updated')
         window.location.href='login.php'</script>";


                                } else {
                                    echo "<script>alert('error')
             window.location.href='registration.php'</script>";

                                }
                            }
                        } else {
                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $image = "image/default.jpg";
                            $mobile = $_POST['mobile_no'];
                            $dob = $_POST['dob'];
                            $gender = $_POST['gender'];
                            $city = $_POST['city'];
                            $query = "INSERT INTO `registration`( `name`, `username`, `email`, `password`, `mobile`, `dob`, `gender`, `city`,`image`) VALUES ('$name','$username','$email','$password','$mobile','$dob','$gender','$city','$image')";
                            $result = mysqli_query($connect, $query);

                            if ($result) {
                                echo "<script>alert('data updated')
         window.location.href='login.php'</script>";


                            } else {
                                echo "<script>alert('error')
             window.location.href='registration.php'</script>";

                            }
                        }
                    }
                    else{
                        echo"<label style='color:red;'>* this username is all ready taken</label></br>";
                    }
                }
                else{
                    echo"<label style='color:red;'>* this username is all ready taken</label></br>";
                }
            }
            else{
                echo"<label style='color:red;'>* this username is all ready taken</label></br>";
            }
        }
        
                    ?>
                    <button type="submit" name="btnInsert" class="btn btn-info" value="ADD">submit</button>

                </div>
            </form>
        </div>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
                // output.style.display = 'block';
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>