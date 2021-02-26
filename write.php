<?php
include("header.php");
session_start();
// error_reporting(0);
$name = $_SESSION['email'];
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'thoughts');
  //  $ids = $_SESSION['id'];


                

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $text = $_POST['textt'];
        $userid = $_POST['userid'];
        $id = $_POST['name'];
       // $date = date('M-d-Y H:i:a');
       
     $q = " INSERT INTO `writescd`(`id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey`) 
     VALUES  (NULL, '$title', '$userid', '$text', current_timestamp(), '$id') ";

      mysqli_query($con,$q);
      echo"<script>
toastr.success('Poem Added',{timeout:2000});</script>";
      echo "<script>window.location = 'main.php'</script>" ;
  }

  ?>


<center>
<div class="container">
<div class=" container w-75 my-4  bg-white rounded  text-warning" style="border: 1px solid;">

	<h3 class="text-warning">Poem</h3>
	<p class="text-warning">note: You can't change or delete once you submit take a note of it!</p>

    <form action="write.php" method="post" style="" class="bg-white text-center p-3 rounded">
      <input type="text" name="title" class="form-control border text-center " maxlength="19" placeholder="Title" required="">
      <textarea class="form-control mt-4 text-center " style="height: 200px; overflow-y: scroll;" name="textt" placeholder="Write only 255 words" required=""></textarea>
      <input type="submit" name="submit" value="DONE" class="btn btn-outline-warning mt-3" >
   
  <!-- fetch -->
  <?php
        $con = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($con, 'thoughts');

        $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw`, `foreginkey` FROM `poetscd` WHERE  email = '$name';";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
            ?>
            <?php
  $userid = $result['uname'];
  $id = $result['id'];
  $_SESSION['id'] = $id;
}
?>
   <input type="hidden" name="userid" value = <?php echo $userid; ?>>
      <input type="hidden" name="name" value = <?php echo $id; ?>>

    </form>

    <!-- //fetch user id -->
   

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


