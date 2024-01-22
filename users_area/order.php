<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

session_start(); // Start the session
//user_id

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Get the username from the session
    $username = $_SESSION['username'];
    // Connect to the database

    // Query the user ID from the users table using the username
    $user_query = "SELECT user_id FROM user_table WHERE username='$username'";
    $user_result = mysqli_query($con, $user_query);
    // Check if the query was successful
    if ($user_result) {
        // Fetch the user ID from the result
        $user_row = mysqli_fetch_array($user_result);
        $user_id = $user_row['user_id'];
        // Use $user_id in your application
    } else {
        // Display an error message if the query failed
        echo "Error getting user ID: " . mysqli_error($con);
    }
} else {
    // // Redirect the user to the login page if not logged in
    // header("Location: login.php");
    // exit();
}



// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    // use $user_id in  application
} else {
    // // Redirect the user to the login page if not logged in
    // header("Location: login.php");
    // exit();
}


$get_ip_address = getIPAddress();
$total_price = 0;
$uniqueId = uniqid(); // Generate a unique identifier
$timestamp = time(); // Get the current timestamp

$invoice_number = $timestamp . '_' . $uniqueId;
$status = 'pending';

// Query the cart details for the given IP address
$cart_query_price = "SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);

$count_products = mysqli_num_rows($result_cart_price);

// Initialize arrays to store product IDs, quantities, and amounts_due
$product_ids = array();
$quantities = array();
$amounts_due = array();

while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $quantity = $row_price['quantity'];

    // Query the product details for the current product ID
    $select_product = "SELECT * FROM products WHERE product_id='$product_id'";
    $run_price = mysqli_query($con, $select_product);
    $row_product_price = mysqli_fetch_array($run_price);

    $product_price = $row_product_price['product_price'];
    $subtotal = $product_price * $quantity;
    $total_price += $subtotal;

    // Store product IDs, quantities, and amounts_due in arrays
    $product_ids[] = $product_id;
    $quantities[] = $quantity;
    $amounts_due[] = $subtotal;
}

// Encode product IDs and quantities into JSON strings
$product_ids_string = json_encode($product_ids);
$quantities_string = json_encode($quantities);

// Insert one order for the whole cart into user_orders table
$insert_order = "INSERT INTO user_orders (user_id,username,product_id, quantity, amount_due, invoice_number, total_products, order_date, order_status) VALUES ('$user_id','$username', '$product_ids_string', '$quantities_string', '$total_price', '$invoice_number', '$count_products', NOW(), '$status')";
$result_query = mysqli_query($con, $insert_order);

if (!$result_query) {
    echo "Error inserting order: " . mysqli_error($con);
}

// Display success message and redirect
if ($result_query) {
    echo "<script>alert('Order is submitted successfully confirm the payment method ')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// Insert pending order into the orders_pending table
$insert_pending_order = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) VALUES ('$user_id', '$invoice_number', '$product_ids_string', '$quantities_string', '$status')";
$result_pending_order = mysqli_query($con, $insert_pending_order);

// Delete items from the cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
$result_delete = mysqli_query($con, $empty_cart);
