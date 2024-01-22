<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        img {
            display: block;
            margin: auto;
            width: 50%
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-----css link--->
    <link rel="stylesheet" href="../style.css">

    <title> HamroKirana_Payment</title>
</head>

<body>



    <!-- php code to access user-id -->
    <?php
    // Get the user’s IP address $user_ip = $_SERVER [‘REMOTE_ADDR’];
    $user_ip = getIPAddress();
    $get_user = "Select * from user_table where user_ip='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-danger text-center ">Payment options</h2>
        <div class="row d-flex justify-content-center align-items-center my-5">
            <!-- <div class="col-md-6"><a href="https://www.paypal.com" target="_blank"><img src="../img/paypal.png" alt=""></a></div> -->
            <div class="col-md-6"><a href="order.php?user_id=<?php echo "$user_id" ?>">

                    <div class="text-center">
                        <button class="submit-button">Submit order</button>
                    </div>
                    <div class="text-center">
                        <a href="../cart.php" class="button"><i class="fa-solid fa-cart-shopping"></i></a>

                        <style>
                            /* styles.css */
                            .button {
                                display: inline-block;
                                background-color: paleturquoise;
                                color: black;
                                padding: 10px 20px;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                                text-decoration: none;
                                /* Add styles to make it look like a button */

                                text-align: center;
                                font-weight: bold;
                                transition: background-color 0.3s ease, color 0.3s ease;
                                margin-top: 20px;
                            }

                            .button:hover {
                                background-color: red;
                                color: white;
                                /* Change text color on hover */
                            }
                        </style>
                    </div>
            </div>

        </div>



    </div>
    </div>
    <style>
        /* Background gradient */
        body {
            background: aqua;
        }

        .text-center {
            text-align: center;
        }

        .submit-button {
            background-color: mediumorchid;
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .submit-button:hover {
            background-color: #e74c3c;
        }
    </style>
</body>
<!--bootstarp js link--->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- foter -->
<footer style="background: linear-gradient(135deg, #FFD700, #E5E4E2); padding: 20px; ">
    <div class="container text-center">
        <p style="color: #333; font-size: 18px; font-weight: bold;">&copy; Hamro Kirana</p>
    </div>
</footer>
<!-- position: fixed; bottom: 0; width: 100%; -->

</html>