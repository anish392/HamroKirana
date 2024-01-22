<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamrokirana- Cart Details</title>
  <!--bootstarp css link--->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-----css link--->
  <link rel="stylesheet" href="style.css">
  <style>
    .cartimg {
      width: 120px;
      height: 120px;
      object-fit: contain;
    }
  </style>

</head>

<body>
  <!---navbar-->
  <div class="container-fluid p-0">
    <!--first child-->
    <nav class="navbar navbar-expand-lg navbar-dark " style="background: linear-gradient(135deg, #f06, #09a, #c0f, #f99);">

      <div class="container-fluid">
        <img src="img/loh.png" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active text-dark" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" href="display_all.php">Products</a>
            </li>
            <?php
            if (isset($_SESSION['username'])) {
              echo "<li class='nav-item'>
              <a class='nav-link text-dark' href='./users_area/profile.php'>My Account</a>
            </li>";
            } else {
              echo " <li class='nav-item'>
              <a class='nav-link text-dark' href='./users_area/user_registration.php'>Register</a>
            </li>";
            }
            ?>
            <!-- <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li> -->
            <li class="nav-item">
              <a class="nav-link text-dark" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php
                                                                                                          cart_item();  ?> </sup></a>
            </li>




          </ul>

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
          <a class='nav-link' href='./users_area/user_login.php'>Login</a>
        </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logut.php'>Logout</a>
        </li>";
        }
        ?>
    </nav>
    <!--third child---->
    <div class="bg-light">
      <h3 class="text-center">Hamrokirana Store</h3>
      <p class="text-center">Good quality groceries at cheap rate</p>


    </div>
    <!-- fourth child -->
    <div class="container">
      <div class="row">
        <form action="" method="post">
          <div class='table-responsive'>
            <table class='table table-bordered mt-5 text-center '>

              <!--php code to display dynamic data  -->

              <?php
              if (isset($_POST['update_cart'])) {
                global $con;
                $get_ip_add = getIPAddress();
                foreach ($_POST['qty'] as $product_id => $quantity) {
                  $quantities = (int)$quantity;
                  $update_cart = "UPDATE cart_details SET quantity = $quantities WHERE product_id = $product_id AND ip_address = '$get_ip_add'";
                  $result_products_quantity = mysqli_query($con, $update_cart);
                }
                $_SESSION['cart_updated'] = true;
              }
              ?>

              <!-- Add the JavaScript script here -->
              <script>
                <?php if (isset($_SESSION['cart_updated']) && $_SESSION['cart_updated'] === true) { ?>
                  alert("Cart updated successfully!");
                  <?php unset($_SESSION['cart_updated']); ?>
                <?php } ?>
              </script>

              <?php
              global $con;
              $get_ip_add = getIPAddress();
              $total_price = 0;
              $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
              $result = mysqli_query($con, $cart_query);
              $result_count = mysqli_num_rows($result);

              if ($result_count > 0) {
                echo "
              <thead class='bg-primary'>
                <tr>
                  <th>Product Title</th>
                  <th>Product Image</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operation</th>
                </tr>
              </thead>
              <tbody>";

                while ($row = mysqli_fetch_array($result)) {
                  $product_id = $row['product_id'];
                  $select_products = "select * from products where product_id='$product_id'";
                  $result_products = mysqli_query($con, $select_products);

                  while ($row_product_price = mysqli_fetch_array($result_products)) {
                    $product_price = array($row_product_price['product_price']);
                    $price_table = $row_product_price['product_price'];
                    $product_title = $row_product_price['product_title'];
                    $product_image1 = $row_product_price['product_image1'];
                    $product_values = array_sum($product_price);
                    $quantity = isset($_POST['qty'][$product_id]) ? max((int)$_POST['qty'][$product_id], 1) : 1;
                    $price = $price_table * $quantity;
                    $total_price += $product_values * $quantity;
              ?>
                    <tr>
                      <td><?php echo $product_title; ?></td>
                      <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" class="cartimg"></td>
                      <td>
                        <input type="text" class="form-input w-50" name="qty[<?php echo $product_id; ?>]" value="<?php echo $quantity ?: 1; ?>">
                      </td>
                      <td><?php echo $price; ?>/-only</td>
                      <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                      <td class="d-flex">
                        <div class="d-flex">
                          <input type="submit" value="Update cart" class="btn btn-info px-3 py-2 mx-3" name="update_cart">
                          <input type="submit" value="Remove cart" class="btn btn-info px-3 py-2 mx-3" name="remove_cart">
                        </div>

                      </td>
                    </tr>
              <?php
                  }
                }
                echo "</tbody></table></div>"; // Close the table and div
              } else {
                echo "<h2 class='text-center text-danger'> Cart is Empty";
              }
              ?>

              <!-- subtotal -->
              <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-5">
                <?php
                if ($result_count > 0) {
                  echo "<h4 class='px-3 mb-3 mb-md-0'>Sub-Total: <strong class='text-info'>$total_price /-only</strong></h4>
        <div class='d-flex'>
            <input type='submit' value='Continue Shopping' class='btn btn-info px-3 py-2 mx-3' name='continue_shopping'>
            <a href='./users_area/checkout.php' class='btn btn-info px-3 py-2' style='border-radius: 5px;'>Checkout</a>
        </div>";
                } else {
                  echo "<input type='submit' value='Continue Shopping' class='btn btn-info px-3 py-2 mx-3' style='border-radius: 5px;' name='continue_shopping'>";
                }
                if (isset($_POST['continue_shopping'])) {
                  echo "<script>window.open('index.php','_self')</script>";
                }
                ?>
              </div>


        </form>
      </div>
    </div>

    <!-- function to remove item-->
    <?php
    function remove_cart_item()
    {
      global $con;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['removeitem'] as $remove_id) {
          echo $remove_id;
          $delete_query = "Delete from cart_details where product_id=$remove_id";
          $run_delete = mysqli_query($con, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
      // run in another tab _blank

    }
    echo $remove_item = remove_cart_item();
    ?>







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
<!-- position: fixed; bottom: 0; width: 100%; -->

</html>