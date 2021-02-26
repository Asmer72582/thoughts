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
	<br>
	
<!-- 
	<div class="row">
		<div class="col-lg-6 col-sm-4">
				<h3>Recent</h3>
			</div>
			<div class="col-lg-6 col-sm-4">
				<h3>Most likes</h3>
			</div>
		</div>	
	</div>	 -->
	<div class="container bg-white">
		<div class="row  pt-3" style="border: 1px solid black; ">
			<div class="col-lg-6">
				<div class=" text-white text-center bg-warning rounded" id="black">
					<a href="#">
						<p class="py-3 text-white">Recent</p>
					</a>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="">
					<a href="mostlikes.php" class="text-dark">
						<p class="py-3 text-black">Most likes</p>
					</a>
				</div>
			</div>
		</div>
	</div>

	
<div class="container">

<div class="text-center mt-5 text-dark">

<div class="row " >

		
							
								
			<?php
				$con = mysqli_connect('localhost', 'root', '');
				mysqli_select_db($con, 'thoughts');
			
				$photo = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly` FROM `writescd` WHERE 1 ORDER BY id DESC;";
				$query = mysqli_query($con, $photo);


				 while ( $result = mysqli_fetch_assoc($query)) {
					  ?><div class="col-lg-4 col-sm-12  my-4  "  id="" >
					<div class="main-item rounded bg-white " style="height: 450px; border: 1px solid black;">
					<?php $poet = $result['poetid']; ?>
							<h1 class="text-warning card-header">Poem</h1>

							<p class="font-weight-bold" style="font-size: 26px;"><?php echo $result['title']; ?></p>
							<!--zzzzzzzzzzzzzzzzzzzzzzzzzzz -->
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

							<!--zzzzzzzzzzzzzzzzzzzzzzzzzzz -->
							<h4 class="text-dark">by: <a class="text-warning" href="profileshow.php?id=<?php echo $show; ?>"><?php echo $result['poetid']; ?></a></h4>
														


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
