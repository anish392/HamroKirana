<?php
if (isset($_GET['delete_users'])) {
    $delete_id = $_GET['delete_users'];
    $delete_user = "delete from user_table where user_id=$delete_id";
    $result_product = mysqli_query($con, $delete_user);
    if ($result_product) {
        echo "<script>alert('User has been deleted sucessfully ')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
