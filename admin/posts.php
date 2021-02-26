<?php 
	session_start();
?>





<section>




<!DOCTYPE html>
<html>
<head>
	<title>main</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
  	
  </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top mb-5">
  <a class="navbar-brand" href="index2.php">Thoughts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    
  </div>  
</nav>
</header>
<br><br><br>
<div class="container-fluid text-center  ">
  <h2>All posts details.</h2>
 
  <hr class="w-75 bg-dark">
  
</div>

<div class="container">
<center>
		<form  action="search2.php" method="get" class="" style="width: 300px; ">		
			
				<input type="text" name="k" class="form-control" placeholder="search title/any content " required="all required" class="mt-5 w-75" style="border-radius: 50px;" value="">
				<br>
				<input type="submit" name="submit" value="GO" class="btn btn-dark text-white text-center " style="border-radius: 20px;" >
			
			
		</form>
</center>
    
      <center>
        <div class="bg-dark">
		<div class="text-center w-75 my-5 bg-white text-dark">
	<div class="container-fluid">
		<div class="row bg-dark" >
		
				
									
										
					<?php
						$con = mysqli_connect('localhost', 'root', '');
			    		mysqli_select_db($con, 'thoughts');
					
					
#
						$photo = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly` FROM `writescd` WHERE 1";
			    		$query = mysqli_query($con, $photo);


			    		 while ( $result = mysqli_fetch_assoc($query)) {
			    		 	?><div class="col-lg-4 col-sm-12  my-4 bg-white " id="point" style="border: 1px solid; border-radius: 5px; ">
                             <a style="float: right;" href="delete2.php?id=<?php echo  $result['id']; ?>"><button class="btn btn-danger"><i class="fas fa-minus"></i></button></a>    		
			    			<div class="main-item" style="height: 450px;">
                            

			    					<h1 class="p-2 card-header">Poem</h1>
			    					<p class="font-weight-bold" style="font-size: 26px;"><?php echo $result['title']; ?></p>
			    					<h4>by: <?php echo $result['poetid']; ?></h4>

			    					 <?php echo $result['dateonly']; ?> 
			    					<hr class="bg-dark w-75" style="color: black; padding: 0;">
			    					
			    				
			    					<center>
			    					<p style=" overflow: hidden; height: 100px; width: 200px; "><?php echo $result['textt']; ?></p></center>
									<hr class="bg-dark w-75" style="color: black;">	
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
<footer>
	<p class="text-center font-weight-bold">DESIGN AND BUILD BY ASMER CHOUGLE</p>
</footer>

</body>
</html>