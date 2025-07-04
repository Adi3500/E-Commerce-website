<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('your-background-image.jpg'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            /* height: 100vh; */
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(8px);
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            padding: 20px;
        }

        .form-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .form-card h2 {
            color: #224abe;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-card label {
            color: #224abe;
            font-weight: bold;
        }

        .form-card input[type="file"] {
            display: none;
        }

        .form-card .custom-file-upload {
            background-color: #224abe;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin: 10px auto;
        }

        .form-card .custom-file-upload:hover {
            background-color: #1c3aa9;
        }

        .form-card img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        .form-card button[type="submit"] {
            background-color: #224abe;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2rem;
            display: block;
            margin: 20px auto;
            transition: background-color 0.3s ease;
        }

        .form-card button[type="submit"]:hover {
            background-color: #1c3aa9;
        }
    </style>
</head>

<body>
    <div class="form-container ">
        <div class="form-card">
            <h2 class="font-bold">Seller Registration</h2>
            <form method="post" enctype="multipart/form-data">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" onchange="previewImage(event)" class="hidden">
                <label for="image" class="custom-file-upload">Choose File</label>
                <img id="preview" src="image/default.jpg" alt="Uploaded Image">
                <div class="mb-4">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="mobile_no">Mobile No.:</label>
                    <input type="text" name="mobile_no" id="mobile_no" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="account_no">Account No.:</label>
                    <input type="text" name="account_no" id="account_no" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="city">City:</label>
                    <select name="city" id="city" class="w-full px-4 py-2 rounded border border-gray-300 focus:outline-none focus:border-blue-500" required>
                        <option value="" selected disabled>Select City</option>
                        <option value="surat">Surat</option>
                        <option value="rajkot">Rajkot</option>
                        <option value="vapi">Vapi</option>
                    </select>
                </div>
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
                        

                        if ($_FILES['image']) {

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
                                $account=$_POST['account_no'];
                                $mobile = $_POST['mobile_no'];
                                $dob = $_POST['dob'];
                                $gender = $_POST['gender'];
                                $city = $_POST['city'];
                                
                                move_uploaded_file($image_tmp, $folder);

                                $query = "INSERT INTO `seller`(`name`, `sellername`, `email`, `password`, `mobile`, `account_no`, `gender`, `city`, `dob`, `image`) VALUES ('$name','$username','$email','$password','$mobile','$account','$gender','$city','$dob','$folder')";

                                $result = mysqli_query($connect, $query);

                                if ($result) {
                                    echo "<script>
         window.location.href='login.php'</script>";


                                } else {
                                    echo "<script>alert('error')
             </script>";

                                }
                            }
                            else{
                                echo "<label style='color:red;'>*please select jpg or png image</label></br> ";
                   
                            }
                        } else {
                            $name = $_POST['name'];
                            $username = $_POST['username'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $image = "image/default.jpg";
                            $mobile = $_POST['mobile_no'];
                            $account=$_POST['account_no'];
                            $dob = $_POST['dob'];
                            $gender = $_POST['gender'];
                            $city = $_POST['city'];
                         
                            $query = "INSERT INTO `seller`(`name`, `sellername`, `email`, `password`, `mobile`, `account_no`, `gender`, `city`, `dob`, `image`) VALUES ('$name','$username','$email','$password','$mobile','$account','$gender','$city','$dob','$image')";
                            $result = mysqli_query($connect, $query);

                            if ($result) {
                                echo "<script>
         window.location.href='login.php'</script>";


                            } else {
                                echo "<script>alert('error')
             </script>";

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
                <button type="submit" name="btnInsert">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>
