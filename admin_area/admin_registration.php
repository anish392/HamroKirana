<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .body {
            overflow: hidden;
        }

        .img-fluid {
            width: 60%;
        }
    </style>
</head>
<!--css file-->
<link rel="stylesheet" href="../style.css">
<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5"> Admin Registration</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-6 ">
                <img src="" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" pattern="^[a-zA-Z0-9]{3,15}$" name="username" placeholder="Enter your username" required="required" class="form-control w-50">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control w-50">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" maxlength="10" minlength="6" id="password" placeholder="Enter your password" required="required" class="form-control w-50">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="cpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm password" required="required" class="form-control w-50">
                    </div>
                    <div>
                        <input type="submit" class="bg-warning py-2 px-3 border-0" name="admin_regristation" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="link-danger text-decoration-none">Login</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<!-- php code -->
<?php
if (isset($_POST['admin_regristation'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash_passsword = password_hash($password, PASSWORD_DEFAULT);
    $cpassword = $_POST['cpassword'];




    //select query
    $select_query = "Select * from admin_table where admin_name='$username' or admin_email='$email'";
    $result = mysqli_query($con, $select_query);
    $rows_count = mysqli_num_rows($result);
    if ($rows_count > 0) {
        echo "<script>alert('This admin already exists change username or email')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    } elseif ($password != $cpassword) {
        echo "<script>alert('Password and confirm password doesnot match')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    } else {
        //insert query///
        $insert_query = "insert into admin_table (admin_name,admin_email,admin_password)
	values('$username','$email','$hash_passsword')";
        $result = mysqli_query($con, $insert_query);
    }

    // $result ko thau ma $sql_execute

    if ($result) {
        echo "<script> alert('Admin registered sucessfully')</script>";
    } else {
        die('mysqli_error'($con));
    }
}

?>