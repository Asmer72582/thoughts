<?php 


include("header.php");
  $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
              $name = $_SESSION['email'];



    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $userid = $_POST['id'];
        $oldpsw = $_POST['oldpsw'];

        if ($password == $oldpsw) {
            $query = " DELETE FROM poetscd WHERE id = $userid ";
            mysqli_query($con, $query);
            echo "<script>toastr.info('Account deleted',{timeout:2000});</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
        else{
            echo "<script>toastr.error('Password doesnt match',{timeout:2000});</script>";
        }

        
    }


?>


<?php  ?> 

<section>

<div class="main-form">



<?php
   

   $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
   $query = mysqli_query($con, $photo);
       while ( $result = mysqli_fetch_assoc($query)) {
       ?>

<?php $id = $result['id']; ?>
<?php $oldpsw = $result['psw']; ?>
             

           
<?php 
           }
?>

<br>


	<div class="content" style=" ">
		<div class="container bg-light  p-5 mb-5" style="border-radius: 15px; border: 1px solid black; width: 300px;">
        <div class="row">
        <div style="text-align: center; col-12">
            <ul class="nav nav-pills ">
                <li class="nav-item col-6">
                <a class="nav-link  text-dark" href="editprofile.php">Change Password</a>
                </li>
                <li class="nav-item col-6">
                <a class="nav-link active bg-warning" href="#">Delete Account</a>
                </li>
            </ul>
				<hr class="w-75 bg-white">

        </div>
        </div>
			<form action="delete.php" method="post">
				<h4 class="text-dark text-center">Delete Account</h4>
				<hr class="w-75 bg-white">
				
				<div class="form-group">
			
				<input type="password" name="password" class="form-control w-sm-50" placeholder="Currrent Password" required="all required">
				</div>
				<input type="hidden" value="<?php echo $id; ?>" name="id">
				<input type="hidden" value="<?php echo $oldpsw; ?>" name="oldpsw">
				<center>
					<input type="submit" name="delete" value="Delete" class="btn btn-outline-warning  text-center " >
					
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