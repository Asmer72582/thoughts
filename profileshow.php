<?php
 session_start();
  
   $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
          // $name = $_GET['poetid'];
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

  <style type="text/css">
  	#hover:hover{
  		display: block;
  		background-color: ;
  		color: white; 

  	}
  	.main-item{
  		height: 400px;
  	}
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

<nav class="navbar navbar-expand-sm bg-white navbar-white  fixed-top mb-5">
  <a class="navbar-brand text-warning" href="main.php">Thoughts</a>
 <button class="navbar-toggler border" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <i class="fas fa-bars text-warning"><sup>[0]</sup></i>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
	<li class="nav-item text-warning">
        <a class="nav-link text-warning " href="notification.php">Notification <i class="fas fa-bell"><sup>0</sup></i> </a>
    	</li>
     <li class="nav-item">
        <a class="nav-link text-warning" href="profile.php">profile  <i class="fas fa-user-alt"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="write.php">Write  <i class="fas fa-marker"></i></a>
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
  <a href="explore.php" style="text-decoration: none; color: white;">
  <u><b>Explore Poems<i class="fa fa-fw fa-search" class="text-center text-warning">
  	
  </i></b></u>
 </a>
</div>



<center>

<div class="my-4 p-3 content bg-white w-50" style="border: 1px solid; ">
<?php
   
   $id = $_GET['id'];
   $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE uname = '$id';";
   $query = mysqli_query($con, $photo);
       while ( $result = mysqli_fetch_assoc($query)) {
       ?>

       <?php echo $result['fname']; ?> <?php echo $result['lname']; ?><br>
      ( <?php echo $result['uname']; ?>)
      <?php $user = $result['uname']; ?>
      <?php $_SESSION['userid'] = $user; ?>
             

           
<?php 
           }
?>



</div>


<div class="bg-white w-50 border">
		  <?php 
		   $photo1 = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey` FROM `writescd` WHERE poetid = '$id'";
		   $result1 = mysqli_query($con, $photo1); 
			if ($result1) 
				{ 
					// it return number of rows in the table. 
					$row = mysqli_num_rows($result1); 
					
					if ($row==1) 
						{ ?>
							 <h4><?php echo $row;?> poem by this poet</h4>
						<?php 
						} 
						elseif($row){?>
							<h4><?php echo $row;?> poems by this poet</h4>
					   <?php 

						}
						
					// close the result. 
					mysqli_free_result($result1); 
				} 

?>
		  </div>

<div class="container">

		<div class="text-center mt-5 text-dark">
	
		<div class="row " >
<?php

$id = $_GET['id'];
$posts = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly` FROM `writescd` WHERE poetid = '$user' ;";
$query = mysqli_query($con, $posts);
            while ( $result = mysqli_fetch_assoc($query)) {
            ?>
            <div class="col-lg-4 col-sm-12  my-4   "  id="" >
					<div class="main-item rounded bg-white" style="height: 450px; border: 1px solid black;">

							<h1 class="text-warning card-header">Poem</h1>

							<p class="font-weight-bold" style="font-size: 26px;"><?php echo $result['title']; ?></p>

							<h4>by: <span class="text-warning"><?php echo $result['poetid']; ?></span></h4>

							 <?php echo $result['dateonly']; ?> 

							<hr class="bg-dark w-75 " style="color: black;">
							
						
							<center>
							<p style=" overflow: hidden; height: 100px; width: 200px; "><?php echo $result['textt']; ?></p></center>
							<hr class="bg-dark w-75 " style="color: black;">	
							<center>	
												
							<h2 class="pb-1 mt-3" id="hover" style="position: relative; border: 1px solid; width: 100px;">
								<a href="more.php?id=<?php echo  $result['id']; ?>" style="text-decoration: none; border-radius: 10px; " class="text-dark">More</a></h2>
							
						</center>
						</div>
					
						</div>

        <?php

      }
        ?>

  </div>
        
    
    
  </div>
</div>



</div>

</center>


<section class=" text-white text-center py-4 bg-warning" style="background:;">
	<div class="mb-5 ">
		<h2>Express What You Feel</h2>
		<h6>Find The Person Inside You</h6>

		
	</div>
	<p class="text-center font-weight-bold ">DESIGN AND BUILD BY <a class="text-white " style="text-decoration: underline;" href="https://asmerfire.web.app/"> ASMER CHOUGLE</a></p>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
