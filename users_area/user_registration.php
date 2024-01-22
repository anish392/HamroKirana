<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> User Registration</title>
	<!--bootstarp css link--->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-----css link--->
	<link rel="stylesheet" href="style.css">

</head>

<body>

	<div class="container-fluid my-3">
		<h2 class="text-center">New User Registration</h2>
		<div class="row d-flex align-items-center justify-content-center">
			<div class="lg-12 col-x1-6   d-flex align-items-center justify-content-center">
				<form method="post" enctype="multipart/form-data">
					<!-- username field -->
					<div class="form-outline mb-4">
						<label for="user_username" class="form-label">Username</label>
						<input type="text" id="user_username" class="form-control" placeholder="Enter your username" pattern="^[a-zA-Z0-9]{3,15}$" autocomplete="off" required="required" name="user_username" />
					</div>
					<!-- emailfield -->
					<div class="form-outline mb-4">
						<label for="user_email" class="form-label">Email</label>
						<input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name=" user_email" />
					</div>
					<!-- password field -->
					<div class="form-outline mb-4">
						<label for="user_password" class="form-label">Password</label>
						<input type="password" maxlength="10" minlength="5" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password" />
					</div>
					<!--confirm password  -->
					<div class="form-outline mb-4">
						<label for="conf_user_password" class="form-label">Confirm Password</label>
						<input type="password" id="conf_user_password" class="form-control" placeholder=" confirm password" autocomplete="off" required="required" name="conf_user_password" />
					</div>
					<!-- address -->
					<div class="form-outline mb-4">
						<label for="user_address" class="form-label">Address</label>
						<input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address" />
					</div>
					<!-- contact -->
					<div class="form-outline mb-4">
						<label for="user_contact" class="form-label">Mobile no.</label>
						<input type="text" pattern="^[9]\d{9,9}$" id="user_contact" class="form-control" placeholder="Enter your Mobile no." autocomplete="off" required="required" name="user_contact" />
					</div>
					<!-- ========================== -->
					<div class="mt-4 pt-2">
						<input type="submit" value="Register" class="bg-info py-2 px-3 border-2" style='border-radius: 5px;' name="user_register" onmouseover="this.style.backgroundColor='#007bff'; this.style.color='#fff';" onmouseout="this.style.backgroundColor=''; this.style.color='';">

						<p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?
							<a href="user_login.php" class="text-warning text-decoration-underline p-6"> Login</a>
						</p>

					</div>
				</form>
			</div>
		</div>
	</div>

	<style>
		body {
			background: linear-gradient(to bottom, #3498db, #e74c3c);

		}
	</style>


</body>


</html>
<!-- php code -->
<?php
if (isset($_POST['user_register'])) {
	$user_username = $_POST['user_username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	$hash_password = password_hash($user_password, PASSWORD_DEFAULT);
	$conf_user_password = $_POST['conf_user_password'];
	$user_ip = getIPAddress();
	$user_address = $_POST['user_address'];
	$user_contact = $_POST['user_contact'];
	$errors = array();

	// Check if email already exists
	$email_check_query = "SELECT * FROM user_table WHERE user_email = '$user_email'";
	$result_email_check = mysqli_query($con, $email_check_query);

	// Check if username already exists
	$username_check_query = "SELECT * FROM user_table WHERE username = '$user_username'";
	$result_username_check = mysqli_query($con, $username_check_query);

	// Check if mobile number already exists
	$mobile_check_query = "SELECT * FROM user_table WHERE user_mobile = '$user_contact'";
	$result_mobile_check = mysqli_query($con, $mobile_check_query);

	if (mysqli_num_rows($result_email_check) > 0) {
		$errors[] = "Email already exists.";
	}

	if (mysqli_num_rows($result_username_check) > 0) {
		$errors[] = "Username already exists.";
	}

	if (mysqli_num_rows($result_mobile_check) > 0) {
		$errors[] = "Mobile number already exists.";
	}

	if ($user_password != $conf_user_password) {
		$errors[] = "Password and confirm password do not match.";
	}

	if (!empty($errors)) {
		$error_message = implode(" ", $errors);
		echo "<script>alert('$error_message')</script>";
		echo "<script>window.open('user_registration.php','_self')</script>";
	} else {
		// Insert query
		$insert_query = "INSERT INTO user_table (username, user_email, user_password, user_ip, user_address, user_mobile)
                     VALUES ('$user_username', '$user_email', '$hash_password', '$user_ip', '$user_address', '$user_contact')";
		$result = mysqli_query($con, $insert_query);
	}


	// $result ko thau ma $sql_execute

	if ($result) {
		echo "<script> alert('User registered sucessfully')</script>";
	} else {
		die('mysqli_error'($con));
	}
	// selecting cart items
	$select_cart_items = "Select * from cart_details where ip_address='$user_ip'";
	$result_cart = mysqli_query($con, $select_cart_items);
	$rows_count = mysqli_num_rows($result_cart);
	if ($rows_count > 0) {
		$_SESSION['username'] = $user_username;
		echo "<script>alert('You have items in your cart')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	} else {
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
?>