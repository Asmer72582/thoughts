<?php 
include("header.php"); 

// error_reporting(0);
$name = $_SESSION['email'];	
       $con = mysqli_connect('localhost', 'root', '');
                    mysqli_select_db($con, 'thoughts');
                    
          $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey` FROM `poetscd` WHERE email = '$name'";
                $query = mysqli_query($con, $photo);
?>
 <?php

                 while ( $result = mysqli_fetch_assoc($query)) {
                   
                   $oldpsw = $result['psw'];



                   }


	if (isset($_POST['submit'])) {
			$firstpsw = $_POST['firstpsw'];
			$psw2 = $_POST['psw2'];
			$psw3 = $_POST['psw3'];

			if ($firstpsw == $oldpsw && $psw2 == $psw3) {

				mysqli_query($con, "UPDATE poetscd SET psw='$psw3' WHERE email = '$name'");
				echo "<script>toastr.success('Password Changed',{timeout:2000});</script>";
			}
			else{
				echo "<script>toastr.error('Old password doesnt match',{timeout:2000});</script>";
			}

	}

?>



<br>

<div class="main-form">

	<div class="content" style=" ">
		<div class="container bg-light  p-5 mb-5" style="border-radius: 15px; border: 1px solid black; width: 300px;">
        <div class="row">
        <div style="text-align: center; col-12">
            <ul class="nav nav-pills ">
                <li class="nav-item col-6">
                <a class="nav-link active bg-warning" href="#">Change Password</a>
                </li>
                <li class="nav-item col-6">
                <a class="nav-link  text-dark" href="delete.php">Delete Account</a>
                </li>
            </ul>
				<hr class="w-75 bg-white">

        </div>
        </div>
			<form action="" method="post">
				<h4 class="text-dark text-center">Change Password</h4>
				<hr class="w-75 bg-white">
				
				<div class="form-group">
			
				<input type="password" name="firstpsw" value="" class="form-control w-sm-50" placeholder="Currrent Password" required="all required">
				</div>
				<div class="form-group">
			
				<input type="password" name="psw2" class="form-control w-sm-50" placeholder="New Password" required="all required">
				</div>
                <div class="form-group">
			
				<input type="password" name="psw3" class="form-control w-sm-50" placeholder="Confirm Password" required="all required">
				</div>
				<center>
					<input type="submit" name="submit" value="Change" class="btn btn-outline-warning text-center " >
					
				</center>
			</form>
		</div>
	</div>
</div>
</section>

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