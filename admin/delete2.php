<?php

  $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');

$id = $_GET['id'];

  $query = " DELETE FROM writescd WHERE id = $id ";

mysqli_query($con, $query);

header('location:posts.php');
?>