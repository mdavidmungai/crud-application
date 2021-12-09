<?php

require_once("../crud/php/operations.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page-wrapper">

<h1>Simple CRUD application using PHP and MySQL</h1>

<form action="" method="post">

<input type="text" placeholder="ID" name="book_id" id="book_id">

<input type="text" placeholder="book name" name="book_name" id="book_name">

<div class="row">
    <input type="text" placeholder="publisher" name="book_publisher" id="book_publisher">
    <input type="text" placeholder="price" name="book_price" id="book_price">
</div>

<div style="margin-bottom:60px">
    <button name="create">Create</button>
    <button name="read">Read</button>
    <button name="update">Update</button>
    <button name="delete">delete</button>
</div>

</form>

<table style="width:100%">
    <tr>
    <th>ID</th>
    <th>Book Name</th>
    <th>Publisher</th>
    <th>Price</th>
    <th>Edit</th>
  </tr>
  
  <?php

  if(isset($_POST['read'])) {
    $result = getData();

    if($result) {
      while($row=mysqli_fetch_assoc($result)){?>

        <tr class="data-row row<?php echo $row['id'];?>" id="<?php echo $row['id'];?>">
          <td id="book-id"><?php echo $row['id'];?></td>
          <td id="book-name"><?php echo $row['book_name'];?></td>
          <td id="book-publisher"><?php echo $row['book_publisher'];?></td>
          <td id="book-price"><?php echo "$" . $row['book_price'];?></td>
          <td id="<?php echo $row['id'];?>" class="last-cell"><button id="button" class="edit-btn">Edit</button></td>
        </tr>
        <?php
      }
    }
  }
  
  ?>

</table>
</div>


<script src="../crud/script.js"></script>
</body>
</html>