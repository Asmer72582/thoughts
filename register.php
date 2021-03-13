
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
<!-- <script src="dist/tata.js"></script> -->
<script src="tata.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
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
  <button class="navbar-toggler bg-warning" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon p-2 "></span>
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
<div class=" py-5 mb-5 text-white bg-warning"  style="width: 100%;">
  <h2 class="text-center">Create Your Own Thoughts.</h2>
  <p class="text-center">Be The change.</p>
 
</div>
<section>
  

<div class="content" style=" ">
  <div class="container  p-5 mb-5" style="border-radius: 15px; width: 300px; background: url('img/bgg.jpg');">
    <form action="" method="post" >
      <h2 class="text-dark text-center">Signup</h2>
      <hr class="w-75 bg-dark">
      
      <div class="form-group">
    
      <input type="text" name="fname" class="form-control w-sm-50" placeholder="Firstname" required="all required">
      </div>
       <div class="form-group">
    
      <input type="text" name="lname" class="form-control w-sm-50" placeholder="Lastname" required="all required">
      </div>
       <div class="form-group">
    
      <input type="text" name="email" class="form-control w-sm-50" placeholder="E-mail" required="all required">
      </div>
       <div class="form-group">
    
      <input type="text" name="uname" onblur="this.value=removeSpaces(this.value);" class="form-control w-sm-50" placeholder="Username" required="all required">
      </div>
      <div class="form-group">
    

    


      <input type="password" minlength="8" name="psw" class="form-control w-sm-50" placeholder="Password " required="all required">
      </div>
      <input type="hidden" name="uid" value="0">
      <center>
        <input type="submit" name="submit" onclick="removeSpaces();" value="Login" class="btn btn-warning text-center " >
        <hr class="w-75 bg-dark">
        <p class="text-dark">Already have an account? <a href="index.php" class="text-decoration-none text-dark hover"> login</a></p>
        
      </center>
    </form>
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
      <script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}


  function error(argument) {
     toastr.error('Username Already Takken',{timeout:2000});
    };
</script>
</body>
</html>

<?php
    // session_start();
    error_reporting(0);  
    

    $con = mysqli_connect('localhost', 'root', '');
    
    mysqli_select_db($con, 'thoughts');

if (isset($_POST['submit'])) {
      
    $id = $_GET['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $psw = $_POST['psw'];
    $foregin = $_POST['uid'];
    $date = date('Y-m-d H:i:s');
    // $psw = MD5($psw);


        

    $q = " select * from poetscd where id ='$id' && fname ='$fname' && lname = '$lname' && email = '$email' && uname = '$uname' && psw = $psw && foreginkey = '$foregin' ";
    $result = mysqli_query($con, $q);

    $_SESSION['id'] = $id;
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['uname'] = $uname;
    $_SESSION['psw'] = $psw;
    $_SESSION['uid'] = $foregin;


    $copy = mysqli_query($con, "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly` FROM `poetscd` WHERE email = '$email' OR uname = '$uname' ");
        
        
    if (mysqli_num_rows($copy)>0) {
           echo "<script>error();</script>";
          // echo "<script>window.location = 'register.php'</script>";
    }
    else{
        $qy = "insert into poetscd( `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly`) value ('$fname','$lname','$email','$uname', '$psw', '$foregin', CURRENT_DATE())";

        
        mysqli_query($con, $qy);
        ?>
       <script>toastr.success('New User successfully Register',{timeout:2000}); </script>
       <script>window.location = 'index.php' </script>

   <?php
        // header("location:index.php");

    }
    

}
?>



