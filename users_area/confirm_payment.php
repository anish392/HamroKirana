<?php
include('../includes/connect.php');

session_start();
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $select_data = "select * from user_orders where order_id=$order_id ";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
    $user_id = $row_fetch['user_id'];
    $username = $row_fetch['username'];
    $total_products = $row_fetch['total_products'];
    $product_id = $row_fetch['product_id'];
    $quantity =  $row_fetch['quantity'];
}
if (isset($_POST['confirm_payment'])) {
    $invoice_number = $_POST['invoice_number'];
    // $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];
    $insert_query = "insert into user_payments (order_id,user_id,username,Total_products,product_id,quantity,invoice_number,amount,payment_mode) 
    values($order_id,$user_id, '$username',$total_products,'$product_id','$quantity',$invoice_number,$amount,'$payment_mode')";
    $result = mysqli_query($con, $insert_query);
    if ($result) {
        echo " <script>alert('Your payment method has been selected sucessfully')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders = " update user_orders set order_status='Complete' where order_id=$order_id";
    $result_order = mysqli_query($con, $update_orders);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamrokirana-payment</title>
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-----css link--->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg" style="background:mediumaquamarine;">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-100 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-100 m-auto" name="amount" value="<?php echo $amount_due ?>" readonly>
            </div>

            <div class="form-outline my-4 text-center w-100 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">

                    <option>Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" style="border-radius: 5px;" value="Confirm" name="confirm_payment">
                <a href="../index.php" class="button">Home</a>

                <style>
                    /* styles.css */
                    .button {
                        display: inline-block;
                        background-color: paleturquoise;
                        color: black;
                        padding: 8px 18px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        text-decoration: none;
                        /* Add styles to make it look like a button */
                        display: inline-block;
                        padding: 8px 18px;
                        text-align: center;
                        font-weight: bold;
                        transition: background-color 0.3s ease, color 0.3s ease;
                    }

                    .button:hover {
                        background-color: #0056b3;
                        color: white;
                        /* Change text color on hover */
                    }
                </style>


        </form>
    </div>


</body>
<!-- foter -->
<footer style="background: linear-gradient(135deg, #FFD700, #E5E4E2); padding: 20px;">
    <div class="container text-center">
        <p style="color: #333; font-size: 18px; font-weight: bold;">&copy; Hamro Kirana</p>
    </div>
</footer>

</html>