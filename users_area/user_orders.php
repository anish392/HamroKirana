<!DOCTYPE html>
<htmL>
</body>
<?php
if (isset($_GET['delete_order'])) {
    include('delete_order.php');
} ?>
<?php
// Start the session if not already started
include('../includes/connect.php');

// Get the user's ID based on the session

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start(); // Start the session if it's not already started
}



// The rest of your code...

$username = $_SESSION['username'];
$get_user = "SELECT * FROM user_table WHERE username='$username'";
$result = mysqli_query($con, $get_user);
$row_fetch = mysqli_fetch_assoc($result);
$user_id = $row_fetch['user_id'];

// Fetch user orders from the database
$get_order_details = "SELECT * FROM user_orders WHERE user_id=$user_id";
$result_orders = mysqli_query($con, $get_order_details);
$row_count = mysqli_num_rows($result_orders);

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
// Delete incomplete orders older than 5 hour
$inactiveThreshold = strtotime('-5 hours');
$deleteQuery = "DELETE FROM user_orders WHERE user_id=$user_id AND order_status='pending' AND order_date < DATE_SUB(NOW(), INTERVAL 5 HOUR)";
mysqli_query($con, $deleteQuery);
?>

<h3 class="text-center text-warning">My orders</h3>
<h3 class="text-center text-danger">The pending orders last upto 5 hours</h3>
<div class="table-responsive">
    <table class="table table-bordered mt-5">
        <thead class="bg-primary">
            <tr>
                <th>SN.</th>
                <!-- <th>Order Id</th> -->
                <!-- <th>Invoice Number</th> -->
                <th>Product Details</th>
                <th>Amount Due</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light'>
            <?php
            if ($row_count == 0) {
                echo "<tr><td colspan='8' class='text-center bg-warning text-danger'>No orders yet</td></tr>";
            } else {
                $number = 1;
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $invoice_number = $row_orders['invoice_number'];

                    $product_ids = json_decode($row_orders['product_id'], true);
                    $quantities = json_decode($row_orders['quantity'], true);

                    $total_amount_due = $row_orders['amount_due'];
                    $product_details = generateProductDetails($product_ids, $quantities);

                    $order_status = $row_orders['order_status'];
                    $order_status_display = ($order_status == 'pending') ? 'Incomplete' : 'Complete';
                    $order_date = $row_orders['order_date'];

                    echo "<tr>
                            <td> $number</td>
                          
                           
                            <td>$product_details</td>
                            <td>$total_amount_due</td>
                            <td> $order_date</td>
                            <td>$order_status_display</td>";

                    if ($order_status == 'Complete') {
                        echo "<td> COD</td>";
                    } else {
                        if ($order_status == 'Complete') {
                            echo "<td> COD</td>";
                        } else {
                            echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a><br><a href='./user_orders.php?delete_order=$order_id' type='button' class=' text-warning' data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a> </td>"; ?>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <h4>Are you sure want to delete this</h4>
                                        </div>
                                        <!-- ? halnu aagadi jastai ?view_brand -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"><a href="./user_orders.php?delete_order=<?php echo $order_id ?>" class="text-light text_decoration-none">Yes</a></button>
                                            <button type="button" class="btn btn-primary"><a href="./profile.php" class="text-light text_decoration-none">No</a></button>

                                        </div>
                                    </div>
                                </div>
                            </div>

            <?php
                        }

                        $number++;
                    }

                    $number++;
                }
            }
            ?>
            <!-- <td> $order_id </td> -->
            <!-- <td> $invoice_number </td> -->



        </tbody>
    </table>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>