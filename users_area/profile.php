<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Welcome <?php echo $_SESSION['username'] ?></title>
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-----css link--->
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <!---navbar-->
    <div class="container-fluid p-0">
        <!--first child-->
        <nav class="navbar navbar-expand-lg navbar-dark " style="background: linear-gradient(135deg, #f06, #09a, #c0f, #f99);">
            <div class="container-fluid">
                <img src="../img/loh.png" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="../display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="profile.php">My Account</a>
                        </li>
                        <!-- <li class="nav-item">
          <a class="nav-link" href="">Contact</a>
        </li> -->
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                                            cart_item();  ?> </sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Total price:<?php
                                                                                total_cart_price();
                                                                                ?> /- only</a>
                        </li>



                    </ul>
                    <!-- <form class="d-flex" action="../search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        --<button class="btn btn-outline-light" type="submit">Search</button> --
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form> -->
                </div>
            </div>
        </nav>
        <!-- calling cart function -->
        <?php
        cart();
        ?>
        <!--second child--->
        <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #FF5733, #E83E8C);">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo " <li class='nav-item'>
          <a class='nav-link' href='#'> Welcome Guest</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
          <a class='nav-link' href=''>Welcome   " .  $_SESSION['username'] . "</a>
        </li>";
                }



                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
          <a class='nav-link' href='user_login.php'>Login</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
          <a class='nav-link' href='logut.php'>Logout</a>
        </li>";
                }
                ?>
                <!-- <li class="nav-item">
          <a class="nav-link" href="./users_area/user_login.php">Login</a>
        </li> -->
        </nav>
        <!--third child---->
        <div class="bg-light">
            <h3 class="text-center">Hamrokirana Store</h3>
            <p class="text-center">Good quality groceries at cheap rate</p>

            </h3>
        </div>
        <!--fourth child--->
        <div class="row">
            <div class="col-md-2 p-0">
                <ul class="navbar-nav  text-center">
                    <!-- color -->
                    <li class="nav-item bg-danger">
                        <a class="nav-link text-light" href="#">
                            <h4>Your Profile</h4>
                        </a>
                    </li>


                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="profile.php">
                            Pending orders
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="./profile.php?edit_account">
                            Edit account
                        </a>
                    </li>
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="./profile.php?my_orders">
                            My orders
                        </a>
                    </li>
                    <!-- deleting -->
                    <!-- <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            Delete Account
                        </a>
                    </li> -->
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="logut.php">
                            Logut
                        </a>
                    </li>
                </ul>

            </div>
            <div class="col-md-10 text-center">
                <?php get_user_order_details();
                if (isset($_GET['edit_account'])) {
                    include('edit_account.php');
                }
                if (isset($_GET['my_orders'])) {
                    include('user_orders.php');
                } ?>
            </div>
        </div>


        <!-- brand image -->


        <!------footer------>
        <!-- <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col-1">
                        <h3>
                            <b>Download our app</b>
                        </h3>
                        <p>Download app for Android and ios mobile phone</p>
                        <div class="app-logo">
                            <img src="../img/bothe.png">

                        </div>
                    </div>
                    <div class="footer-col-2">
                        <h3>
                            <img src="../img/logo.png">
                            <p><b>
                                    <h6>Our purprose is to provide high quality groceries with cheap rate</h6>
                                </b></p>
                        </h3>
                    </div>
                    <div class="footer-col-3">
                        <h3>Useful links</h3>
                        <ul>
                            <li>Blog post</li>
                            <li>Return policy</li>
                        </ul>

                    </div>
                    <div class="footer-col-4">
                        <h3>Follow us</h3>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                            <li>Youtube</li>
                            <li>Instagram</li>
                        </ul>



                    </div>
                </div>
                <hr>
                <p class="copyright">©Copyright 2022-Hamrokirana</p>
            </div>
        </div> -->









        <!--bootstarp js link--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
</body>
<!-- foter -->
<footer style="background: linear-gradient(135deg, #FFD700, #E5E4E2); padding: 20px;">
    <div class="container text-center">
        <p style="color: #333; font-size: 18px; font-weight: bold;">&copy; Hamro Kirana</p>
    </div>
</footer>


</html>