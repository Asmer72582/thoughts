<?php

  $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');

$id = $_GET['id'];

  $query = " DELETE FROM poetscd WHERE id = $id ";

mysqli_query($con, $query);

header('location:users.php');
?>