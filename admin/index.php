<?php
session_start();

$con = mysqli_connect('localhost', 'root');
// if ($con) {
//  echo "success complete";
    
// }
// else{
//     echo "fail";
// }
$db = mysqli_select_db($con, 'thoughts');

if (isset($_POST['submit'])) {
    $user = $_POST['admin'];
    $pass = $_POST['adminpas'];
    
    $sql = "select * from admin where user = '$user' && pass= '$pass' ";

    $query = mysqli_query($con,$sql);

    $row = mysqli_num_rows($query);
        if ($row==1) {
            $_SESSION['user'] = $user;
            header('location:index2.php');

        }else{
            header('location:index.php');
        }
    
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>admin panel</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container  bg-dark " style="width: 300px; margin-top: 150px;">
		<form action="index.php" method="post">
			<div class="form-group py-5">
				<input type="text" name="admin" class="form-control mb-5" required style="border-radius: 50px;" placeholder="Admin User">
				<input type="password" name="adminpas" class="form-control" required style="border-radius: 50px;" placeholder="Admin Password">
				<center><input type="submit" name="submit" value="submit" class="mt-5"></center>
			</div>
		</form>
	</div>
</body>
</html>