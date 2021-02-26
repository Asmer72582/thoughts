
		<?php 
	session_start();
	error_reporting(0);
?>

<?php include("header.php"); ?> 


<br>
	<center>
	<form  action="search.php" method="get" class="row" style="width: 300px; ">		
			
			<input type="text" name="k" class="form-control col-10" placeholder="search title/any content " required="all required" class="mt-5" style="border-radius: 10px;" value="">
			<br>
			<input type="submit" name="submit" value="GO" class="btn btn-outline-warning  text-center col-2 " style="border-radius: 10px; " >
		
		
	</form>
</center>

<center>
<div class="container">

		<div class="text-center mt-5  text-dark">
	
		<div class="row">
		
<?php
			if (isset($_GET['k'])) {
				$con = mysqli_connect('localhost', 'root', '', 'thoughts');

				$k = $con->escape_string($_GET['k']);

				$query = $con->query("
					SELECT id, title, poetid,textt, dateonly
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

 $poet = $r->poetid;
				
		?>
				
				<div class="col-lg-4 col-sm-12  my-4   "  id="" >
			    			<div class="main-item rounded bg-white " style="height: 450px; border: 1px solid black;">
							<?php $poet = $r->poetid; ?>
			    					<h1 class="text-warning card-header">Poem</h1>

						<p class="font-weight-bold" style="font-size: 26px;"><?php echo $r->title; ?></p>

						<?php 
$photo2 = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey`, `dateonly` FROM `poetscd` WHERE uname = '$poet'";
$query2 = mysqli_query($con, $photo2);


while ( $result2 = mysqli_fetch_assoc($query2)) {
?>
<?php $show = $result2['id']; 

?>

<?php
}
?>					

						<h4>by: <a class="text-warning" href="profileshow.php?id=<?php echo $show; ?>"><?php echo $r->poetid;?></a></h4>

						<?php echo $r->dateonly; ?><br>

					
				
						<hr class="bg-dark w-75" style="color: black;">
						<center>
						<p align="center" style=" overflow: hidden; height: 100px; width: 200px;"><?php echo $r->textt; ?></p>
					</center>

						 
						
						<hr class="bg-dark w-75" style="color: black;">
						<center>
					<h2 class="pb-1 mt-3" id="hover" style="position: relative; border: 1px solid; width: 100px;"><a href="more.php?id=<?php echo $r->id; ?>" style="text-decoration: none; " class="text-dark">More</a></h2></center>
						
				    </div>
				</div>

<?php

    		}
    	}else{?>
    		
    		<center><h1 class="text-warning text-center">No result found</h1></center>

    		<?php
    	}
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
