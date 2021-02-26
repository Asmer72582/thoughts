
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
<script src="dist/tata.js"></script>
<script src="tata.js"></script>
  <style type="text/css">
  	body {
        background: url("img/bgg.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
  </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-sm bg-white navbar-dark fixed-top mb-5">
  <a class="navbar-brand text-warning" href="#">Thoughts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-warning" href="register.php">Register <i class="fas fa-user-edit"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="index.php">Login <i class="fas fa-sign-in-alt"></i></a>
      </li>    
    </ul>
  </div>  
</nav>
</header>
<br><br>
<div class=" py-5 mb-4 text-white bg-warning">
  <h2 class="text-center">Create Your Own Thoughts.</h2>
  <p class="text-center">Be The change.</p>
 
</div>
<section>

<div class="main-form">

	<div class="content" style=" ">
		<div class="container bg- p-5 mb-5" style="border-radius: 15px; width: 300px; background: url('img/bgg.jpg');">
			<form action="index.php" method="post">
				<h2 class="text-dark text-center">Login</h2>
				<hr class="w-75 bg-dark">
				
				<div class="form-group">
			
				<input type="text" name="username" class="form-control w-sm-50" placeholder="Username" required="all required">
				</div>
				<div class="form-group">
			
				<input type="password" onblur="this.value=removeSpaces1(this.value);" name="psw2" class="form-control w-sm-50" placeholder="Password" required="all required">
				</div>
				<center>
					<input type="submit" onclick="removeSpaces1();" name="submit" value="Login" class="btn btn-warning text-center " >
					<hr class="w-75 bg-dark">
					<p class="text-dark">New User? <a href="register.php" class="text-decoration-none text-dark hover"> register</a></p>
					
				</center>
			</form>
		</div>
	</div>
</div>
</section>
<section>
	<div class=" text-dark mb-5  text-center py-4">
		<h2>Express What You Feel</h2>
		<h6>Find The Person Inside You</h6>
		
	</div>
</section>
<footer>
	<p class="text-center font-weight-bold bg-warning p-3 text-white">DESIGN AND BUILD BY <span class="text-white"><a style="color: white;" href="https://asmerfire.web.app">ASMER CHOUGLE</a></span></p>
</footer>


<script type="text/javascript">
	function error(argument) {
     toastr.error('wrong username and password',{timeout:2000});
    };
</script>





    
</body>
</html>

<?php
    session_start();
    error_reporting(0);
    // include 'scripts.php';

    $con = mysqli_connect('localhost', 'root', '');
    
    mysqli_select_db($con, 'thoughts');

    
    $user = $_POST['username'];
    $pass2 = $_POST['psw2'];
    // $pass2 = md5('psw2');

    $_SESSION['name'] = $user;
    $q = " select * from poetscd where uname = '$user' && psw = '$pass2' ";
    $result = mysqli_query($con, $q);
            
    $id = $_GET['username'];
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        
        $row = mysqli_fetch_array($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $id;
        header('location:main.php');
        
        
    }
    else{
     // echo "<script>error();</script>";
     // echo "<script>window.location = 'index.php';</script>";
     
    }


?>
<?php
if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $id = $_GET['id'];
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           // $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                $_SESSION['id'] = $id;  
                echo "<script>window.location.href = 'main.php'</script>";
           }  
           else  
           {  
                echo "<script>error();</script>";  
                // echo "<script>window.location.href = 'main.php'</script>";  
           }  

      }  
 }  
 ?>  
