<?php
if (isset($_GET['delete_brand'])) {
    $delete_brand = $_GET['delete_brand'];
    $delete_query = "delete from brands where brand_id= $delete_brand";
    $result = mysqli_query($con, $delete_query);
    if ($result) {
        echo "<script>alert('brand has been deleted sucessfully ')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
