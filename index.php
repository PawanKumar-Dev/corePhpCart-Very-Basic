<?php
session_start();

// Check if product is coming or not
if (isset($_GET['pro_id'])) {

  $proid = $_GET['pro_id'];

  // If session cart is not empty
  if (!empty($_SESSION['cart'])) {

    // Using "array_column() function" we get the product id existing in session cart array
    $acol = array_column($_SESSION['cart'], 'pro_id');

    // now we compare whther id already exist with "in_array() function"
    if (in_array($proid, $acol)) {
      
      // Updating quantity if item already exist
      echo "<script>
              alert('Item exists already!');";
      echo  $_SESSION['cart'][$proid]['qty'] += 1;
      echo "</script>";
      
    } else {
      // If item doesn't exist in session cart array, we add a new item
      $item = [
        'pro_id' => $_GET['pro_id'],
        'qty' => 1
      ];

      $_SESSION['cart'][$proid] = $item;
    }
  } else {
    // If cart is completely empty, then store item in session cart
    $item = [
      'pro_id' => $_GET['pro_id'],
      'qty' => 1
    ];

    $_SESSION['cart'][$proid] = $item;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>

  <a href="cart.php">Cart <?php if (isset($_SESSION['cart'])) {
    echo count($_SESSION['cart']);
  } ?></a>
  

  <h1>Products</h1>

  <a href="index.php?pro_id=1">Add to Cart</a>
  <br><br>

  <a href="index.php?pro_id=2">Add to Cart</a>
  <br><br>

  <a href="index.php?pro_id=3">Add to Cart</a>

</body>

</html>