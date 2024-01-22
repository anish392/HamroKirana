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
    <title>Admin Dashboard</title>
    <!--bootstarp css link--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .product_img {
            object-fit: contain;
            width: 100px;
        }
    </style>
</head>
<!--css file-->
<link rel="stylesheet" href="../style.css">
<!--font awesome link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--firstchild-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <img src="../img/loh.png" class="logo">
                <nav class="navbar navbar-expand-lg">

                </nav>
            </div>
        </nav>
        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center text-sm-left text-md-left text-lg-left p-2">
                Manage Details
            </h3>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12  p-1 d-flex align-items-center" style="background: linear-gradient(to bottom, #007BFF, #FF073A);max-height: 50px; ">
                    <div class="p-3">
                        <!-- <a href="/"><img src="" class="admin_image"></a> -->
                        <p class="text-light text-center">
                            <?php
                            if (!isset($_SESSION['admin_name'])) {
                                echo "<li class='nav-item'style='list-style: none;'>
                                  <a class='nav-link text-light' href='admin_login.php'> Welcome Guest</a>
                              </li>";
                            } else {
                                echo "<li class='nav-item'style='list-style: none;'>
                                  <a class='nav-link text-light' href='#'>Welcome   " . $_SESSION['admin_name'] . "</a>
                              </li>";
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="insert_product.php" class="nav-link text-light">Insert products</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?view_products" class="nav-link text-light">View products</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?insert_category" class="nav-link text-light">Insert categories</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?view_categories" class="nav-link text-light">View categories</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?insert_brand" class="nav-link text-light">Insert brands</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?view_brands" class="nav-link text-light">View brands</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?list_orders" class="nav-link text-light">All orders</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?list_payment" class="nav-link text-light">All payment</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?list_users" class="nav-link text-light">List users</a>
                    </button>
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <button class="btn btn-info btn-block my-1">
                        <a href="index.php?logout_admin" class="nav-link text-light">Logout</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['view_products'])) {
                include('view_products.php');
            }
            if (isset($_GET['edit_products'])) {
                include('edit_products.php');
            }
            if (isset($_GET['delete_products'])) {
                include('delete_products.php');
            }
            if (isset($_GET['view_categories'])) {
                include('view_categories.php');
            }
            if (isset($_GET['view_brands'])) {
                include('view_brands.php');
            }
            if (isset($_GET['edit_category'])) {
                include('edit_category.php');
            }
            if (isset($_GET['delete_category'])) {
                include('delete_category.php');
            }
            if (isset($_GET['edit_brand'])) {
                include('edit_brand.php');
            }
            if (isset($_GET['delete_brand'])) {
                include('delete_brand.php');
            }
            if (isset($_GET['list_orders'])) {
                include('list_orders.php');
            }
            if (isset($_GET['delete_orders'])) {
                include('delete_orders.php');
            }
            if (isset($_GET['list_payment'])) {
                include('list_payment.php');
            }
            if (isset($_GET['delete_payment'])) {
                include('delete_payment.php');
            }
            if (isset($_GET['delete_users'])) {
                include('delete_users.php');
            }
            if (isset($_GET['list_users'])) {
                include('list_users.php');
            }
            if (isset($_GET['logut_admin'])) {
                include('logut_admin.php');
            }








            ?>
        </div>
























        <!--bootstarp js link--->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>