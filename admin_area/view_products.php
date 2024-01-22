<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
</head>

<body>
    <h3 class="text-danger text-center">All products</h3>
    <div class='table-responsive'>
        <table class="table table-bordered mt-5">
            <thead class=bg-info>
                <tr>
                    <th>Product Id</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Total sold</th>
                    <th>status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">

                <?php
                $get_products = "select * from products ";
                $result = mysqli_query($con, $get_products);
                // $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_image1 = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $status = $row['status'];
                    // $number++;
                ?>
                    <tr class='text-center'>
                        <td><?php echo $product_id; ?></td>
                        <td><?php echo $product_title; ?></td>
                        <td> <img src='./product_images/<?php echo $product_image1; ?>' class=' product_img' alt=''> </td>
                        <td> <?php echo $product_price; ?></td>
                        <td><?php
                            $get_count = "select * from orders_pending where product_id=$product_id";
                            $result_count = mysqli_query($con, $get_count);
                            $rows_count = mysqli_num_rows($result_count);
                            echo $rows_count;
                            ?></td>
                        <td><?php echo $status; ?></td>
                        <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i> </a></td>
                        <td><a href='index.php?delete_product=<?php echo $product_id ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a> </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <h4>Are you sure want to delete this</h4>
                    </div>
                    <!-- ? halnu aagadi jastai ?view_brand -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary"><a href="./index.php?delete_products=<?php echo $product_id ?>" class="text-light text_decoration-none">Yes</a></button>
                        <button type="button" class="btn btn-primary"><a href="./index.php" class="text-light text_decoration-none">No</a></button>

                    </div>
                </div>
            </div>
        </div>
</body>


</html>