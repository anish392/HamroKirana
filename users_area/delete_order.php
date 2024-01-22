<?php

include('../includes/connect.php'); // Include the database connection file

if (isset($_GET['delete_order'])) {
    $delete_order = $_GET['delete_order'];
    $delete_query = "DELETE FROM user_orders WHERE order_id = $delete_order";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('Order has been deleted successfully')</script>";
        echo "<script>window.open('./profile.php','_self')</script>";
    } else {
        // echo "Error deleting order: " . mysqli_error($con);
    }
}
