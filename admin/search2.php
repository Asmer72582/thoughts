
		<?php 
	session_start();
	error_reporting(0);
?>

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
  <style type="text/css">
  	#hover:hover{
  		display: block;
  		background-color: black;
  		color: white; 

  	}
  	.main-item{
  		height: 400px;
  	}
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
  <h5>Create Your Own Thoughts.</h5>
  <p>Be The change.</p>
  <hr class="w-75 bg-dark">
 
</div>


<br>
	<center>
		<form  action="search.php" method="get" class="" style="width: 300px; ">		
			
				<input type="text" name="k" class="form-control" placeholder="search title/any content " required="all required" class="mt-5 w-75" style="border-radius: 50px;" value="">
				<br>
				<input type="submit" name="submit" value="GO" class="btn btn-dark text-white text-center " style="border-radius: 20px;" >
			
			
		</form>
</center>

<center>
<div class="bg-dark">
		<div class="text-center w-75 mt-5 bg-white text-dark">
		<div class="row bg-dark" >

<?php
			if (isset($_GET['k'])) {
				$con = mysqli_connect('localhost', 'root', '', 'thoughts');

				$k = $con->escape_string($_GET['k']);

				$query = $con->query("
					SELECT title, poetid,textt, dateonly
					FROM writescd
					WHERE title LIKE '%$k%'
					OR textt LIKE '%$k%'
				");
?>


				<?php
				if ($query->num_rows) {
					while ($r = $query->fetch_object()) {
						?>
						
<?php
				
		?>
				
				<div class="col-lg-4 col-sm-12  mt-4 bg-white " id="point" style="border: 1px solid; border-radius: 5px; ">
                <a style="float: right;" href="delete2.php?id=<?php echo  $result['id']; ?>"><button class="btn btn-danger"><i class="fas fa-minus"></i></button></a>
                    <div class="main-item" style="height: 450px;">
						<h1 class="p-2 card-header">Poem</h1>
						<p class="font-weight-bold" style="font-size: 26px;"><?php echo $r->title; ?></p>
						<h4>by: <?php echo $r->poetid;?></h4>
						<?php echo $r->dateonly; ?><br>

					
				
						<hr class="bg-dark w-75" style="color: black;">
						<center>
						<p align="center" style=" overflow: hidden; height: 100px; width: 200px;"><?php echo $r->textt; ?></p>
					</center>

						 
						
						<hr class="bg-dark w-75" style="color: black;">
						<center>
					<h2 class="pb-1 mt-3" id="hover" style="position: relative; border: 1px solid; width: 100px;"><a href="more.php" style="text-decoration: none; " class="text-dark">More</a></h2></center>
						
				    </div>
				</div>

<?php

    		}
    	}
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
