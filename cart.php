<?php session_start(); ?>

<table>
  <thead>
    <tr>
      <th>S.no</th>
      <th>Product Id</th>
      <th>Quantity</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    foreach($_SESSION['cart'] as $cart):
    ?>
    <tr>
      <td><?php echo $i; ?> # </td>
      <td><?php echo $cart['pro_id'] ;?></td>
      <td><?php echo $cart['qty'] ;?></td>
      <td><a href="removecartitem.php?id=<?php echo $cart['pro_id']; ?>">Remove</a></td>
    </tr>
    <?php
    $i++;
    endforeach;
    ?>
  </tbody>
</table>