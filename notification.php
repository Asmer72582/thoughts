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


<?php 
	



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
        <a class="nav-link text-warning " href="notifaction.php" id="go">Notification <i class="fas fa-bell"><sup><?php echo $totalcount; ?></sup></i> </a>
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
<div class="container text-warning">


   <div class="content m-4 bg-white text-warning pb-3 rounded" style="border: 1px solid;">
      <h3 class="p-3 text-white bg-warning">Notifications</h3>
      <br>
      <div class="px-3 " style="font-size: 18px;">
      <?php $notifactions_query = "SELECT * FROM `comment_notifications` WHERE to_user = '$username' AND status = '0' ORDER BY id DESC";

      $query = mysqli_query($con, $notifactions_query);
      while ( $result = mysqli_fetch_assoc($query)) { 
        $nameofuser = $result['poet_id'];
      ?>
<?php 

		$photo2 = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly` FROM `poetscd` WHERE id = '$nameofuser'";
		$query2 = mysqli_query($con, $photo2);


		while ( $result2 = mysqli_fetch_assoc($query2)) {


			$show = $result2['uname'];

		}
      ?> 
      <hr class="text-warning bg-warning">
      <span class="text-bold"><b><a class="text-warning" href="profileshow.php?id=<?php echo $result['from_user']; ?>"><?php echo $result['from_user']; ?></a></b></span>
      <span style="color: black;"><?php echo " Comment on your poem ";?> on </span>
      <span><b><a href="poemview.php?id=<?php echo $result['id_post']; ?>">-<?php echo $result['post_id']; ?>-</a></b></span>
     
      <span> '</span><span style="color: black;"><?php echo $result['comment']; ?></span>'<b>(new)</b><br>



      <?php 
}
      ?>
      <?php $notifactions_query = "SELECT * FROM `notifications` WHERE to_user = '$username' AND status = '0'  ORDER BY id DESC";

      $query = mysqli_query($con, $notifactions_query);
      while ( $result = mysqli_fetch_assoc($query)) { 

      ?>

      <hr class="text-warning bg-warning">
      <span class="text-bold"><b><a class="text-warning" href="profileshow.php?id=<?php echo $result['from_user']; ?>"><?php echo $result['from_user']; $nameofuser = $result['from_user'];?></a></b></span>
      <span style="color: black;"><?php echo " like your poem"; ?> on </span>
      <span><b><a href="poemview.php?id=<?php echo $result['id_post']; ?>"><?php echo $result['post_id']; ?></a></b> </span><b>(new)</b>


      <?php }

      ?>
      <!-- <hr style="border: 1px solid black; "> -->

      
    <!--// unseen -->
  
      
        <div class="px-3 " style="font-size: 18px;">
        <?php $notifactions_query = "SELECT * FROM `comment_notifications` WHERE to_user = '$username' AND status = '1' ORDER BY id DESC ";
        $query = mysqli_query($con, $notifactions_query);
        while ( $result = mysqli_fetch_assoc($query)) { 
    $nameofuser = $result['from_user'];
        ?>
        <?php $notifactions_quer2y = "SELECT * FROM `notifications` WHERE to_user = '$username' AND status = '1'  ORDER BY id DESC";

      $quer2y = mysqli_query($con, $notifactions_quer2y);
      while ( $resu2lt = mysqli_fetch_assoc($quer2y)) { 

      ?>

      <hr class="text-warning bg-warning">
      <span class="text-bold"><b><a class="text-warning" href="profileshow.php?id=<?php echo $resu2lt['from_user']; ?>"><?php echo $resu2lt['from_user']; $nameofuser = $resu2lt['from_user'];?></a></b></span>
      <span style="color: black;"><?php echo " like your poem"; ?> on </span>
      <span><b><a href="poemview.php?id=<?php echo $resu2lt['id_post']; ?>"><?php echo $resu2lt['post_id']; ?></a></b> </span>


      <?php }

      ?>
        <?php 

		$photo2 = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly` FROM `poetscd` WHERE uname = '$nameofuser'";
		$query2 = mysqli_query($con, $photo2);


		while ( $result2 = mysqli_fetch_assoc($query2)) {


			$show = $result2['id'];
		}

   

      ?> 
        <hr class="text-warning bg-warning">
      <span class="text-bold"><b><a class="text-warning" href="profileshow.php?id=<?php echo $result['from_user']; ?>"><?php echo $result['from_user']; ?></a></b></span>
      <span style="color: black;"><?php echo " Comment on your poem ";?> on </span>
      <span><b><a href="poemview.php?id=<?php echo $result['id_post']; ?>">-<?php echo $result['post_id']; ?>-</a></b></span>
     
      <span> '</span><span style="color: black;"><?php echo $result['comment']; ?></span>'<br>




        <?php

$photo2 = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly` FROM `poetscd` WHERE uname = '$nameofuser'";
		$query2 = mysqli_query($con, $photo2);


		while ( $result2 = mysqli_fetch_assoc($query2)) {


			$shows = $result2['id'];

		}
	 $shows;
         }


        ?>
				</div>
				</div>
	
</div>
<script type="text/javascript">
  $(document).ready(function () {
    $('#go').ready(function(){
      jQuery.ajax({
        url: 'update_status.php',
        success:function(){
            
        }
      });
    });
  });
</script>