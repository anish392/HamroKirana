<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HamroKirana-checkout page</title>
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
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
              <a class='nav-link text-dark' href='../users_area/profile.php'>My Account</a>
            </li>";
                        } else {
                            echo " <li class='nav-item'>
              <a class='nav-link text-dark' href='./users_area/user_registration.php'>Register</a>
            </li>";
                        }
                        ?>
                        <!-- <li class="nav-item">
          <a class="nav-link" href="">Contact</a>
        </li> -->


                    </ul>
                    <!-- <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                         --- <button class="btn btn-outline-light" type="submit">Search</button> --
                        <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                    </form> -->
                </div>
            </div>
        </nav>

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
          <a class='nav-link' href='./user_login.php'>Login</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
          <a class='nav-link' href='./logut.php'>Logout</a>
        </li>";
                }
                ?>
        </nav>
        <!--third child---->
        <div class="bg-light">
            <h3 class="text-center">Hamrokirana Store</h3>
            <p class="text-center">Good quality groceries at cheap rate</p>

            </h3>
        </div>
        <!--fourth child--->
        <div class="row px-1">
            <div class="col-md-12">
                <!--product-->
                <div class="row">
                    <?php
                    if (!isset($_SESSION['username'])) {
                        include('user_login.php');
                    } else {
                        include('payment.php');
                    }
                    ?>
                </div>
                <!-- column end -->
            </div>
        </div>


        <!-- brand image -->





        <!--bootstarp js link--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </div>
</body>


</html>