<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List orders</title>
</head>

<body>
    <h3 class="text-center text-success">All orders</h3>
    <div class='table-responsive'>
        <table class="table table-bordered mt-5">
            <thead class="bg-primary text-center">
                <?php
                $get_orders = "Select * from user_orders";
                $result = mysqli_query($con, $get_orders);
                $row_count = mysqli_num_rows($result);

                if ($row_count == 0) {
                    echo "<h2 class='text-center bg-warning text-danger text-center mt-5'>No orders yet</h2>";
                } else {
                    echo "<tr>
                <th>SN</th>
                 <th>Order Id</th>
                <th>User id</th>
                 <th>Username</th>
                <th>Product id</th>
                <th>Quantity</th>
                <th>Due amount</th>
                <th>Invoice Number</th>
                <th>Total products</th>
                <th>Order Date</th>
                <th>status</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center bg-secondary text-light'>";
                    $number = 0;
                    while ($row_data = mysqli_fetch_assoc($result)) {
                        $order_id = $row_data['order_id'];
                        $user_id = $row_data['user_id'];
                        $username = $row_data['username'];
                        $product_id = $row_data['product_id'];
                        $quantity = $row_data['quantity'];
                        $amount_due = $row_data['amount_due'];
                        $invoice_number = $row_data['invoice_number'];
                        $total_products = $row_data['total_products'];
                        $order_date = $row_data['order_date'];
                        $order_status = $row_data['order_status'];
                        $number++;
                        echo " <tr>
                <td>$number</td>
                 <td>$order_id</td>
                <td>$user_id</td>
                 <td>$username</td>
                <td>$product_id </td>
                <td>$quantity </td>
                <td> $amount_due</td>
                <td> $invoice_number</td>
                <td>$total_products</td>
                <td>$order_date</td>
                <td>$order_status</td>
                <td><a href='index.php?delete_orders=<?php echo $order_id ?>' type='button' class=' text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a> </td>";
                    }
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
                        <button type="button" class="btn btn-primary"><a href="./index.php?delete_orders=<?php echo $order_id ?>" class="text-light text_decoration-none">Yes</a></button>
                        <button type="button" class="btn btn-primary"><a href="./index.php" class="text-light text_decoration-none">No</a></button>

                    </div>
                </div>
            </div>
        </div>
</body>

</html>