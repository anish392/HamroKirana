<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Payment</title>
</head>

<body>
    <h3 class="text-center text-success">All Payments</h3>
    <div class='table-responsive'>
        <table class="table table-bordered mt-5">
            <thead class="bg-primary text-center">
                <?php
                // Function to generate the product details string
                function generateProductDetails($product_ids, $quantities)
                {
                    if (is_array($product_ids) && is_array($quantities)) {
                        $product_details = [];
                        for ($i = 0; $i < count($product_ids); $i++) {
                            $product_details[] = $product_ids[$i] . ' Q(' . $quantities[$i] . ')';
                        }
                        return implode(', ', $product_details);
                    } else {
                        return 'Invalid product details';
                    }
                }
                ?>

                <?php
                $get_payment = "Select * from user_payments";
                $result = mysqli_query($con, $get_payment);
                $row_count = mysqli_num_rows($result);

                if ($row_count == 0) {
                    echo "<h2 class='text-center bg-warning text-danger text-center mt-5'>No payments yet</h2>";
                } else {
                    echo "<tr>
                <th>SN</th>
                <th>Order_id</th>
                 <th>User_id</th> 
                  <th>Username</th> 
                 <th>Products_details</th>
                  <th>Total_products</th> 
              <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment mode</th>
                <th>Order date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class='text-center bg-secondary text-light'>";
                    $number = 0;
                    while ($row_data = mysqli_fetch_assoc($result)) {
                        $payment_id = $row_data['payment_id'];
                        $order_id = $row_data['order_id'];
                        $user_id = $row_data['user_id'];
                        $username = $row_data['username'];
                        $total_products = $row_data['Total_products'];
                        $amount = $row_data['amount'];
                        $invoice_number = $row_data['invoice_number'];
                        $payment_mode = $row_data['payment_mode'];
                        $date = $row_data['date'];
                        $product_ids = json_decode($row_data['product_id'], true);
                        $quantities = json_decode($row_data['quantity'], true);
                        $product_details = generateProductDetails($product_ids, $quantities);
                        $number++;
                        echo " <tr>
                <td>$number</td>
                       <td>$order_id</td>
                              <td>$user_id</td>
                              <td>$username</td>
                                  <td>$product_details</td>
                               <td> $total_products</td>
               <td> $invoice_number</td> 
                <td> $amount</td>
                
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_payment=<?php echo $payment_id ?>' type='button' class=' text-light' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a> </td>";
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
                        <button type="button" class="btn btn-primary"><a href="./index.php?delete_payment=<?php echo $payment_id ?>" class="text-light text_decoration-none">Yes</a></button>
                        <button type="button" class="btn btn-primary"><a href="./index.php" class="text-light text_decoration-none">No</a></button>

                    </div>
                </div>
            </div>
        </div>
</body>


</html>