<?php
// include('./includes/connect.php');
// getting product
function getproducts()

{
  global $con;
  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {




      $select_query = "Select * from products order by rand() LIMIT 0,8";
      $result_query = mysqli_query($con, $select_query);
      // $row=mysqli_fetch_assoc($result_query);
      // echo $row['product_title'];
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class'col-md-4'>
        <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <h5 class='card-title'>$product_id</h5>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/- only</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
    <a href='./product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
  </div>
</div>
  </div>";
      }
    }
  }
}
//getting all products
function get_all_products()
{
  global $con;
  // condition to check isset or not
  if (!isset($_GET['category'])) {
    if (!isset($_GET['brand'])) {




      $select_query = "Select * from products order by rand()";
      $result_query = mysqli_query($con, $select_query);
      // $row=mysqli_fetch_assoc($result_query);
      // echo $row['product_title'];
      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo "<div class'col-md-4'>
        <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <h5 class='card-title'>$product_id</h5>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/- only</p>
   <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
    <a href='./product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
   
  </div>
</div>
  </div>";
      }
    }
  }
}


//get unique categories
function get_unique_categories()
{
  global $con;
  // condition to check isset or not
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];
    $select_query = "Select * from products where category_id=$category_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_nows = mysqli_num_rows($result_query);
    if ($num_of_nows == 0) {
      echo "<h2 class='text-center text-danger'> No stock for this category</h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class'col-md-4'>
        <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <h5 class='card-title'>$product_id</h5>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/- only</p>
   <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
    <a href='./product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
  </div>
</div>
  </div>";
    }
  }
}
//getting unique brands
function get_unique_brands()
{
  global $con;
  // condition to check isset or not
  if (isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $select_query = "Select * from products where brand_id=$brand_id";
    $result_query = mysqli_query($con, $select_query);
    $num_of_nows = mysqli_num_rows($result_query);
    if ($num_of_nows == 0) {
      echo "<h2 class='text-danger'> This brand is not available </h2>";
    }
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title'];
    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo "<div class'col-md-4'>
        <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <h5 class='card-title'>$product_id</h5>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/- only</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
    <a href='./product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    
  </div>
</div>
  </div>";
    }
  }
}
// displaying brands in side navbar
function getbrands()
{
  global $con;
  $select_brands = "select * from brands";
  $result_brands = mysqli_query($con, $select_brands);
  //$row_data=mysqli_fetch_assoc($result_brands);
  // echo $row_data['brand_title'];//
  while ($row_data = mysqli_fetch_assoc($result_brands)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "<li class='nav-item'>
  <a href='index.php?brand=$brand_id' class='nav-link text-light'><h4>$brand_title</h4></a>
  
    
 </li>";
  }
}



// displaying categories in side navbar
function getcategories()
{
  global $con;
  $select_categories = "select * from categories";
  $result_categories = mysqli_query($con, $select_categories);
  //$row_data=mysqli_fetch_assoc($result_categories);
  // echo $row_data['category_title'];//
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
  <a href='index.php?category=$category_id' class='nav-link text-light'><h4>$category_title</h4></a>
  </li>";
  }
}

// Function to perform Quick Sort on an array based on product price
function quick_sort_by_price(&$array, $low, $high, $order = 'asc')
{
  if ($low < $high) {
    $pivot = partition_by_price($array, $low, $high, $order);
    quick_sort_by_price($array, $low, $pivot - 1, $order);
    quick_sort_by_price($array, $pivot + 1, $high, $order);
  }
}

function partition_by_price(&$array, $low, $high, $order)
{
  $pivotValue = $array[$high]['product_price'];
  $pivotIndex = $low;
  for ($i = $low; $i < $high; $i++) {
    if (($order === 'asc' && $array[$i]['product_price'] <= $pivotValue)
      || ($order === 'desc' && $array[$i]['product_price'] >= $pivotValue)
    ) {
      // Swap array elements at pivotIndex and i
      $temp = $array[$pivotIndex];
      $array[$pivotIndex] = $array[$i];
      $array[$i] = $temp;
      $pivotIndex++;
    }
  }

  // Swap array elements at pivotIndex and high (place pivot element at the correct position)
  $temp = $array[$pivotIndex];
  $array[$pivotIndex] = $array[$high];
  $array[$high] = $temp;

  return $pivotIndex;
}

// Function to perform Linear Search on an array based on search keyword and product id
function linear_search($array, $search_data_value)
{
  $results = array();

  foreach ($array as $item) {
    if ($item['product_id'] == $search_data_value || stripos($item['product_keywords'], $search_data_value) !== false) {
      $results[] = $item;
    }
  }

  return $results;
}

// Function to calculate similarity between two items based on product features
function calculate_similarity($item1, $item2)
{
  // Define product features for similarity calculation
  $feature1 = array(
    'clicks' => $item1['clicks'],
    'views' => $item1['views'],
    'search_count' => $item1['search_count']
  );

  $feature2 = array(
    'clicks' => $item2['clicks'],
    'views' => $item2['views'],
    'search_count' => $item2['search_count']
  );

  // Calculate similarity using cosine similarity
  $dotProduct = 0;
  $magnitude1 = 0;
  $magnitude2 = 0;

  foreach ($feature1 as $key => $value) {
    $dotProduct += $value * $feature2[$key];
    $magnitude1 += $value * $value;
    $magnitude2 += $feature2[$key] * $feature2[$key];
  }

  $similarity_score = $dotProduct / (sqrt($magnitude1) * sqrt($magnitude2));

  return $similarity_score;
}

// Function to generate content-based recommendations
function generate_content_based_recommendations($target_product_id, $products)
{
  // Get the target product based on product_id
  // $target_product = $products[$target_product_id];

  // Generate recommendations based on search_count, clicks, and views
  $recommendations = array();
  foreach ($products as $product_id => $product) {
    if ($product_id !== $target_product_id) {
      // Calculate a weighted score based on search_count, clicks, and views
      $score = 2 * $product['search_count'] + $product['clicks'] + $product['views'];
      $recommendations[$product_id] = $score;
    }
  }

  // Sort recommendations based on the weighted score in descending order
  arsort($recommendations);

  // Return the top N recommendations (e.g., N = 3)
  $top_recommendations = array_slice($recommendations, 0, 3, true);

  return $top_recommendations;
}


// Function to track user interactions (clicks and views)
function track_user_interactions($product_id, $interaction_type)
{
  global $con;

  // Increment clicks or views for the given product based on interaction_type
  $sql = "UPDATE products SET ";
  if ($interaction_type === 'click') {
    $sql .= "clicks = clicks + 1 ";
  } elseif ($interaction_type === 'view') {
    $sql .= "views = views + 1 ";
  }
  $sql .= "WHERE product_id = $product_id";

  mysqli_query($con, $sql);
}

// Function to update search count for a product
function update_search_count($product_id)
{
  global $con;

  $sql = "UPDATE products SET search_count = search_count + 1 WHERE product_id = $product_id";
  mysqli_query($con, $sql);
}

// Function to search for products and display recommendations
function search_product()
{
  global $con;

  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data_product'];

    $products = array(); // Store product data in an array

    // Fetch product data from the database and store it in the $products array
    $fetch_query = "SELECT * FROM products";
    $result_query = mysqli_query($con, $fetch_query);

    while ($row = mysqli_fetch_assoc($result_query)) {
      $products[] = $row;
    }


    // Update search count for the searched product
    $filtered_results = linear_search($products, $search_data_value);
    foreach ($filtered_results as $product) {
      update_search_count($product['product_id']);
    }

    // Perform linear search to find products that match the search keyword
    $filtered_results = linear_search($products, $search_data_value);

    // Check if sort_order is set and perform Quick Sort accordingly
    if (isset($_GET['sort_order'])) {
      $sort_order = $_GET['sort_order'];
      if ($sort_order === 'high_to_low') {
        quick_sort_by_price($filtered_results, 0, count($filtered_results) - 1, 'desc');
      } elseif ($sort_order === 'low_to_high') {
        quick_sort_by_price($filtered_results, 0, count($filtered_results) - 1, 'asc');
      }
    }

    $num_of_rows = count($filtered_results);

    if ($num_of_rows === 0) {
      echo "<h2 class='text-center text-danger'>No such product available</h2>";
    }

    // Display the search results and track interactions
    foreach ($filtered_results as $row) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_image1 = $row['product_image1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];

      echo "<div class='col-md-4'>
                      <div class='card'>
                      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                      <h5 class='card-title'>$product_id</h5>
                      <div class='card-body'>
                          <h5 class='card-title'>$product_title</h5>
                          <p class='card-text'>$product_description</p>
                          <p class='card-text'>Price: $product_price/- only</p>
                          <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
                          <a href='./product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                      </div>
                      </div>
                  </div>";

      // Track views for each displayed product
      track_user_interactions($product_id, 'view');
    }

    // Fetch the product ID of the first result for content-based recommendations
    $first_result_id = isset($filtered_results[0]['product_id']) ? $filtered_results[0]['product_id'] : null;

    if ($first_result_id !== null) {
      // Generate content-based recommendations for the first result and display them
      $content_based_recs = generate_content_based_recommendations($first_result_id, $products);
      echo "<h3>Recommended Products:</h3>";
      foreach ($content_based_recs as $rec_product_id => $score) {
        $rec_product = $products[$rec_product_id];
        // Display the recommended product information
        echo "<div class='recommended-product'>
  <img src='./admin_area/product_images/{$rec_product['product_image1']}' alt='{$rec_product['product_title']}' class='recommended-product-image' width='200' height='200'>
  <h5 class='card-title'>{$rec_product['product_title']}</h5>
  <p class='card-text'>{$rec_product['product_description']}</p>
  <p class='card-text'>Price: {$rec_product['product_price']}/- only</p>
  <a href='index.php?add_to_cart={$rec_product['product_id']}' class='btn btn-danger'>Add to cart</a>
  <a href='./product_details.php?product_id={$rec_product['product_id']}' class='btn btn-secondary'>View more</a>
</div>";

        // Track clicks for the recommended products
        track_user_interactions($rec_product_id, 'click');
      }
    }
  }
}


// view details fuunction  //
function view_details()
{
  global $con;
  // condition to check isset or not
  if (isset($_GET['product_id'])) {
    if (!isset($_GET['category'])) {
      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];

        $select_query = "Select * from products where product_id=$product_id";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_image1 = $row['product_image1'];
          $product_image2 = $row['product_image2'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo "<div class'col-md-4'>
        <div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
   <p class='card-text '>$product_id</p>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
     <p class='card-text'>Price:$product_price/- only</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-danger'>Add to cart</a>
    <a href='index.php' class='btn btn-secondary'>Go home</a>
    
  </div>
</div>
  </div>
  <div class='row'>
    <div class='col-md-12'>
    <h4 class='text-center text-info mb-5'>Related Images</h4> 
    </div>
    <div class='col-md-6'>

    </div>
    <div class='col-md-6'>
<img src='./admin_area/product_images/$product_image2' class='card-img-top'alt='$product_title'>
    </div>

    </div>
   </div>";
        }
      }
    }
  }
}
//  get ip address function

function getIPAddress()
{
  //whether ip is from the share internet  
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
  }
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  //whether ip is from the remote address  
  else {
    $ip = $_SERVER['REMOTE_ADDR'];
  }
  return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

// cart function 
function cart()
{
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $get_ip_add = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "select * from cart_details where ip_address='$get_ip_add' and product_id=$get_product_id ";
    $result_query = mysqli_query($con, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script>alert('This item is already present in the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    } else {
      $insert_query = "insert into cart_details (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',1 )";
      $result_query = mysqli_query($con, $insert_query);
      echo "<script>alert('Item is added to the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}

function cart_item()
{
  global $con;
  $get_ip_add = getIPAddress();
  $select_query = "select * from cart_details where ip_address='$get_ip_add'";
  $result_query = mysqli_query($con, $select_query);
  $count_cart_items = mysqli_num_rows($result_query);
  echo $count_cart_items;
}

function total_cart_price()
{
  global $con;
  $get_ip_add = getIPAddress();
  $total_price = 0;
  $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
  $result = mysqli_query($con, $cart_query);
  while ($row = mysqli_fetch_array($result)) {
    $product_id = $row['product_id'];
    $select_products = "select * from products where product_id='$product_id'";
    $result_products = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_values = array_sum($product_price);
      $quantity = max($row['quantity'], 1);
      $total_price += $product_values * $quantity;
    }
  }
  echo $total_price;
}

// get user order details
function get_user_order_details()
{
  global $con;
  $user_username = $_SESSION['username'];
  $get_details = "Select * from user_table where username= '$user_username' ";
  $result_query = mysqli_query($con, $get_details);
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
    if (!isset($_GET['edit_account'])) {
      if (!isset($_GET['my_orders'])) {
        if (!isset($_GET['delete_account'])) {
          $get_orders = "select * from user_orders where user_id=$user_id and order_status='pending'";
          $result_orders_query = mysqli_query($con, $get_orders);
          $_row_count = mysqli_num_rows($result_orders_query);
          if ($_row_count > 0) {
            echo "<h3 class='text-center text-warning mt-5 mb-2'>You have <span class='text-danger'>$_row_count</span> pending orders</h3>
           <p class='text-center'> <a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          } else {
            echo "<h3 class='text-center text-warning mt-5 mb-2'>You have 0 pending orders</h3>
           <p class='text-center'> <a href='../index.php' class='text-dark'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}
