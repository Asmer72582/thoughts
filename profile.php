<?php include("header.php"); ?><?php

  
   $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
			  $name = $_SESSION['email'];
          
?>

 

<center>

<div class="m-4 p-3 bg-white content w-50" style="border: 1px solid; ">

  <?php
   

        $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name' ";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
            ?>
			<?php $id =  $result['id']; ?>
			<?php $_SESSION['user_id'] = $result['id']; ?>
            <?php echo $result['fname']; ?> <?php echo $result['lname']; ?><br>
           (<?php echo $result['uname']; ?>)
           <?php $user = $result['uname']; ?>
           <?php $_SESSION['userid'] = $user; ?>
		   
		  
		  
                  

                
<?php 
			
                }
?>
<br>
 <a href="editprofile.php" class="text-warning">Edit Profile</a>


</div>


<div class="bg-white w-50 border">
		  <?php 
		   $photo1 = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey` FROM `writescd` WHERE foreginkey = '$id' ORDER BY id DESC ";
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
						elseif($row==0){
							?>
							<h4><span style="display:none;"><?php echo $row; ?></span> Write something</h4>
							<a href="write.php"><button class="btn btn-outline-dark my-3">Write</button></a>
					   	<?php 
						}
					// close the result. 
					mysqli_free_result($result1); 
				} 

?>
		  </div>


<div class="container">

<div class="text-center mt-5  text-dark">

<div class="row " >

		
							
								
			<?php
				$con = mysqli_connect('localhost', 'root', '');
				mysqli_select_db($con, 'thoughts');
			
				$photo = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly` FROM `writescd` WHERE poetid = '$user' ORDER BY id DESC ";
				$query = mysqli_query($con, $photo);


				 while ( $result = mysqli_fetch_assoc($query)) {
					  ?><div class="col-lg-4 col-sm-12  my-4   "  id="" >
					<div class="main-item rounded bg-white " style="height: 450px; border: 1px solid black;">

							<h1 class=" card-header text-warning">Poem</h1>

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
