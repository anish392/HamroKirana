<?php
if (isset($_GET['edit_brand'])) {
    $edit_brand = $_GET['edit_brand'];
    $get_brands = "Select * from brands where brand_id=$edit_brand";
    $result = mysqli_query($con, $get_brands);
    $row = mysqli_fetch_assoc($result);
    $brand_title = $row['brand_title'];
}
if (isset($_POST['edit_brand'])) {
    $brand_title = $_POST['brand_title'];
    $update_query = "update brands set brand_title='$brand_title' where brand_id=$edit_brand";
    $result_brand = mysqli_query($con, $update_query);
    if ($result_brand) {
        echo "<script>
    alert('brand has been updated sucessfully ')
</script>";
        echo "<script>
    window.open('./index.php', '_self')
</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="text-center text-success">Edit Brand</h1>
        <form action="" method="post" class="text-center">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="brand_title">Brand Title</label>
                <input type="text" name="brand_title" id="brand_title" class="form-control " required="required" value="<?php echo $brand_title ?>">

            </div>
            <input type="submit" value="Update Brand" class="btn btn-warning px-3 mb-3" name="edit_brand">
        </form>
    </div>

</body>

</html>