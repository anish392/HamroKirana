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
  <title>HamroKirana</title>
  <!--bootstarp css link--->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--font awesome link--->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-----css link--->
  <link rel="stylesheet" href="style.css">

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
                                                                                                          cart_item();
                                                                                                          ?></sup></a>
            </li>
            <a class="nav-link text-dark" href="#">Total price:<?php
                                                                total_cart_price();
                                                                ?> /- only</a>
            </li>



          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
            <!--   <button class="btn btn-outline-light" type="submit">Search</button> -->
            <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
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
        // login logut
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

      </h3>
    </div>
    <!--fourth child--->
    <div class="row px-1">
      <div class="col-md-10">
        <!--product-->
        <div class="row">


          <!-- fetching product -->
          <?php
          //***calling function***
          view_details();
          get_unique_brands();
          get_unique_categories();


          //     $select_query="Select * from products order by rand() 0,8";
          //     $result_query=mysqli_query($con,$select_query);
          // $row=mysqli_fetch_assoc($result_query);
          // echo $row['product_title'];
          //     while($row=mysqli_fetch_assoc($result_query)){
          //    $product_id=$row['product_id'];
          //    $product_title=$row['product_title'];
          //    $product_description=$row['product_description'];
          //    $product_image1=$row['product_image1'];
          //    $product_price=$row['product_price'];
          //    $category_id=$row['category_id'];
          //    $brand_id=$row['brand_id'];
          //    echo"<div class'col-md-4'>
          //         <div class='card'>
          //   <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          //   <div class='card-body'>
          //     <h5 class='card-title'>$product_title</h5>
          //     <p class='card-text'>$product_description</p>
          //     <a href='#' class='btn btn-danger'>Add to cart</a>
          //     <a href='#' class='btn btn-secondary'>View more</a>
          //   </div>
          // </div>
          //   </div>";
          //     }

          ?>
          <!-- <div class="col-md-4">
        <div class="card">
  <img src="img/b1.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Black glass</h5>
    <p class="card-text">---------------------</p>
    <a href="#" class="btn btn-danger">Add to cart</a>
    <a href="#" class="btn btn-secondary">View more</a>
  </div>
</div>
  </div> -->
          <!-- row end  -->
        </div>
        <!-- column end -->
      </div>

      <div class="col-md-2  p-0">
        <!-- Sidebar -->
        <div id="sidebar" class="scrollable-sidebar">
          <!-- Brands -->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light text-center px-5">
                <h4 class="ani">Brands</h4>
              </a>
            </li>
            <?php
            getbrands();
            ?>
          </ul>

          <style>
            #sidebar .navbar-nav a.nav-link h4 {
              color: black;
            }

            #sidebar .navbar-nav a.nav-link h4.ani {
              color: white;
            }
          </style>
          <!-- Categories -->
          <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-info">
              <a href="#" class="nav-link text-light text-center px-5">
                <h4 class="ani">Categories</h4>
              </a>
            </li>
            <?php
            getcategories();
            ?>
          </ul>
        </div>
        <!-- Toggle Sidebar Button -->
        <button id="toggleSidebar" class="btn btn-danger">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <style>
        #sidebar {
          width: 250px;
          /* Set the desired width of the sidebar */
          max-height: calc(100vh - 230px);
          /* Set max-height to the viewport height minus the top position */
          position: fixed;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
          top: 230px;
          right: -250px;
          /* Initially hide the sidebar off-screen */
          background-color: #ffd6d6;
          /* Sidebar background color */
          transition: right 0.3s;
          background: linear-gradient(to bottom, #ff9900, #ff6600);
          border-radius: 10px;
          outline: 2px solid #ccc;
          font-family: "Fira Code, Consolas, 'Courier New', monospace"
        }

        #sidebar ul.navbar-nav li.nav-item:hover {
          background-color: #ff9900;
          /* Add more styles as needed */
        }

        #sidebar.show {
          right: 0;
          /* Show the sidebar when the 'show' class is added */
        }

        #toggleSidebar {
          position: fixed;
          top: 180px;
          right: 10px;
          z-index: 1;
        }

        .scrollable-sidebar {
          width: 250px;
          /* Set the desired width of the sidebar */
          max-height: calc(100vh - 230px);
          /* Set max-height to the viewport height minus the top position */
          position: fixed;
          top: 230px;
          right: -250px;
          /* Initially hide the sidebar off-screen */
          background-color: #ffd6d6;
          /* Sidebar background color */
          transition: right 0.3s;
          overflow-y: auto;
          /* Enable vertical scrollbar when content exceeds height */
          font-family: "Fira Code, Consolas, 'Courier New', monospace"
        }
      </style>
      <script>
        document.getElementById("toggleSidebar").addEventListener("click", function() {
          document.getElementById("sidebar").classList.toggle("show");
        });
      </script>
    </div>



  </div>








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