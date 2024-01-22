<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .body {
            overflow: hidden;
        }

        .img-fluid {
            width: 100%;
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
        <h2 class="text-center mb-5"> Admin Login</h2>
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 col-xl-6 ">
                <!-- <img src="" alt="Admin login" class="img-fluid"> -->
            </div>
            <div class="col-lg-6 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required="required" class="form-control w-50">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required="required" class="form-control w-50">
                    </div>


                    <div>
                        <input type="submit" class="bg-warning py-2 px-3 border-0" name="admin_login" value="login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="admin_registration.php" class="link-danger text-decoration-none">Register</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<!-- checking login condition -->
<?php
if (isset($_POST['admin_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $select_query = "Select * from admin_table where admin_name='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);


    // ------------------------------------------------------------------------------------------------




    if ($row_count > 0) {
        $_SESSION['admin_name'] = $username;

        if (password_verify($password, $row_data['admin_password'])) {
            // echo "<script>alert('Login sucessful')</script>";
            if (
                $row_count == 1

            ) {
                $_SESSION['admin_name'] = $username;
                echo "<script>alert('Login sucessful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        } else {

            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>