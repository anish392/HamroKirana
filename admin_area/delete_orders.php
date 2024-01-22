<?php
if (isset($_GET['delete_orders'])) {
    $delete_order = $_GET['delete_orders'];
    $delete_query = "delete from user_orders where order_id=  $delete_order";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('Orders has been deleted sucessfully ')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
