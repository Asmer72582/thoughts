<?php 
session_start();

  
   $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
          // $name = $_GET['poetid'];
               $name = $_SESSION['email'];
              

?>
<style>
.content{
    float: center;
}
</style>

<?php  $userdetail = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
        $queryfire = mysqli_query($con, $userdetail);
            while ( $result3 = mysqli_fetch_assoc($queryfire)) {
            ?>
            <?php $username = $result3['uname']; 
 

}
            ?>
<?php 
	$count = "SELECT * FROM `comment_notifications` WHERE status = '0' AND to_user = '$username'  ";
	$querycount = mysqli_query($con, $count);
	$comment_count = mysqli_num_rows($querycount);
	$count2 = "SELECT * FROM `notifications` WHERE status = '0' AND to_user = '$username'  ";
	$querycount2 = mysqli_query($con, $count2);
	$likes_count = mysqli_num_rows($querycount2);
	$totalcount = $comment_count + $likes_count;
?>


<?php $notifactions_query = "SELECT * FROM `comment_notifications` WHERE to_user = '$username'; ";
           $query = mysqli_query($con, $notifactions_query);
            while ( $result = mysqli_fetch_assoc($query)) { 
 				$nameofuser = $result['from_user']; 
 				$status = $result['status'];          	
}
            	?>
<!DOCTYPE html>
<html>
<head>
	<title>Thoughts-poetry-app</title>
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
  	#hover:hover{
  		display: block;
  		background-color: ;
  		color: white; 

  	}
  	/* .main-item{
  		height: 400px;
  	} */
    body {
        background: url("img/bgg.jpg");
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
    #id{
      background: black;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-white navbar-warning  fixed-top mb-5">
  <a class="navbar-brand text-warning" href="main.php" id="go">Thoughts</a>
  <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <i class="fas fa-bars text-warning"><sup>[<?php echo $totalcount; ?>]</sup></i>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
	<li class="nav-item text-warning">
        <a class="nav-link text-warning " href="notifications.php" id="go">Notification <i class="fas fa-bell"><sup><?php echo $totalcount; ?></sup></i> </a>
    	</li>
     <li class="nav-item">
        <a class="nav-link text-warning" href="profile.php" id="go">profile  <i class="fas fa-user-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="write.php" id="go">Write  <i class="fas fa-marker"></i></a>
      </li> 
      <li class="nav-item">
        <a class="nav-link text-warning" href="logout.php">Logout  <i class="fas fa-sign-out-alt"></i></a>
      </li>  
    </ul>
  </div>  
</nav>
</header>
<br><br>
<div class="container-fluid text-center py-5 text-white bg-warning  " style="background: ;" >
  <h5>Create Your Own Thoughts.</h5>
  <p>Be The change.</p>
  <hr class="w-75 bg-light">
  <a href="explore.php" id="go" style="text-decoration: none; color: white;">
  <u><b>Explore Poems<i class="fa fa-fw fa-search" class="text-center text-warning">
  	
  </i></b></u>
 </a>
</div>
<?php 
  if (!isset($_SESSION['email'])) {
    echo "<script>window.location = 'index.php';</script>";
  }
?>
<?php 
  
 

if ( $status = '0' ) {




  echo "<div class='content m-4 bg-white text-warning pb-3 rounded'>
<h3 class='p-3 text-white bg-warning'>New Notification</h3>
          <br>
<div class='px-5'>
          ".
   $msg = "All the Notifications";
  $query_comments = mysqli_query($con, "SELECT * FROM `comment_notifications` WHERE to_user = '$username' AND status = '0' ORDER BY id DESC");
  while ( $result_comments = mysqli_fetch_assoc($query_comments)) { 
  
   ?>


   <br><hr>

           

<!-- likes -->
        <a href="profileshow.php?id=<?php echo $result_comments['from_user']; ?>">
                    <?php echo $result_comments['from_user'];?></a>
                    <?php echo ' comment on your poem - ' .$result_comments['post_id'];
                    echo "--". $result_comments['comment'];
                  ?> 

<!-- comment -->
    
   <?php 
}
$notifactions_query1 = "SELECT * FROM `notifications` WHERE to_user = '$username' AND status = '0'  ORDER BY id DESC";

      $query1 = mysqli_query($con, $notifactions_query1);
      while ( $result_likes = mysqli_fetch_assoc($query1)) { 
?><br><hr>
 <a href="profileshow.php?id=<?php echo $result_likes['from_user']; ?>">
                    <?php echo $result_likes['from_user'];?></a>
                    <?php echo ' like your poem - ' .$result_likes['post_id'];
                  ?> 
<?php

}
      "</div>
        </div>";

}
elseif ($status = '1') {

  echo "<div class='content m-4 bg-white text-warning pb-3 rounded'>
<h3 class='p-3 text-white bg-warning'>Old Notification</h3>
          <br>
<div class='px-5'>
          ".
   $msg = "All the Notifications";
  $query_comments = mysqli_query($con, "SELECT * FROM `comment_notifications` WHERE to_user = '$username' AND status = '1' ORDER BY id DESC");
  while ( $result_comments = mysqli_fetch_assoc($query_comments)) { 
  
   ?>


   <br><hr>

<!-- likes -->
        <a href="profileshow.php?id=<?php echo $result_comments['from_user']; ?>">
                    <?php echo $result_comments['from_user'];?></a>
                    <?php echo ' comment on your poem - ' .$result_comments['post_id'];
                    echo "--". $result_comments['comment'];
                  ?> 

<!-- comment -->
    
   <?php 
}
$notifactions_query1 = "SELECT * FROM `notifications` WHERE to_user = '$username' AND status = '1'  ORDER BY id DESC";

      $query1 = mysqli_query($con, $notifactions_query1);
      while ( $result_likes = mysqli_fetch_assoc($query1)) { 
?><br><hr>
 <a href="profileshow.php?id=<?php echo $result_likes['from_user']; ?>">
                    <?php echo $result_likes['from_user'];?></a>
                    <?php echo ' like your poem - ' .$result_likes['post_id'];
                  ?> 
<?php

}
      "</div>
        </div>";

}
else{
  echo "<div class='container'>
          <a href='write.php'><button class='btn btn-outline-warning'>Wanna be famous</button></a>
        </div>";
        // echo $username;
}


?>