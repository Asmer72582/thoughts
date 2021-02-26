<?php 
include('header.php');

$id = $_GET['id'];
 
            $userdata = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey`, `bookmark`, `likes` FROM `writescd` WHERE id = $id ";
              $userh = mysqli_query($con, $userdata);


               while ( $userf = mysqli_fetch_assoc($userh)) {
                $touser = $userf['poetid'];

  }
  // error_reporting(0);
  include ("script.php");
    $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
  $name = $_SESSION['email'];
  $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
            $from_user = $result['uname'];

  }

if (isset($_POST['submit'])) {
    $poem = $_POST['poem'];
    $poet = $_POST['poet'];
    $poem_id = $_POST['poem_id'];
    $to_user = $_POST['to_user'];
    $comment = $_POST['comment'];
    $date = date('M-d-Y, h:i: a.');
    $idshow = $_POST['idshow'];

    if ($to_user == $username) {
        $query = "INSERT INTO `comment`(`comment`, `poet`, `post`, `c_time`, `poet_id`) 
        VALUES ('$comment', '$poet', '$poem_id','$date', '$idshow')";

        $re = mysqli_query($con, $query);

    }
    else{
       $query = "INSERT INTO `comment`(`comment`, `poet`, `post`, `c_time`, `poet_id`) 
        VALUES ('$comment', '$poet', '$poem_id','$date', '$idshow')";

        $re = mysqli_query($con, $query);
        if ($re==1) {
          $insert = "INSERT INTO `comment_notifications`(`from_user`, `to_user`, `comment`, `post_id`, `status`, `poet_id`)
          VALUES ('$from_user', '$to_user', '$comment', '$poem', '', '$idshow')";
          mysqli_query($con, $insert);
        }
        echo "<script>toastr.success('comment added',{timeout:2000});</script>";
        
    }
}

?>
<!-- likes -->




<!-- likes -->


<?php  $userdetail = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` 
WHERE email = '$name';";
        $queryfire = mysqli_query($con, $userdetail);
            while ( $result3 = mysqli_fetch_assoc($queryfire)) {
            ?>
            <?php $username = $result3['uname']; 

}            ?>

<!-- check like -->

<?php  $userdetail2 = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` 
WHERE uname = '$touser';";
        $queryfire2 = mysqli_query($con, $userdetail2);
            while ( $resultk = mysqli_fetch_assoc($queryfire2)) {
        
              $show = $resultk['id']; 
            ?>
<?php 
}?>


<div class="container">
<script src="ajax.js"></script>
<div class="text-center mt-5 text-dark">

<div class="row mb-5 " >
 
<?php 





          $id = $_GET['id'];
 
            $photo = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey`, `bookmark`, `likes` FROM `writescd` WHERE id = $id ";
              $query = mysqli_query($con, $photo);


               while ( $result = mysqli_fetch_assoc($query)) {
               ?>
             <div class="col-lg-5 col-sm-12  my-4 " style="align-items: center;"  >
			    			<div class="main-item rounded bg-white" style=" border: 1px solid black;">
							<?php $poet = $result['poetid']; ?>
			    					<h1 class=" card-header text-warning">Poem</h1>

			    					<p class="font-weight-bold" style="font-size: 26px;"><?php echo $result['title']; ?></p>
									<!--zzzzzzzzzzzzzzzzzzzzzzzzzzz -->
                  <?php $title_poem = $result['title']; ?>
									<?php $total_likes = $result['likes']; ?>

									<!--zzzzzzzzzzzzzzzzzzzzzzzzzzz -->
			    					<h4 class="text-dark">by: <a class="text-warning" href="profileshow.php?id=<?php echo $show; ?>"><?php echo $result['poetid'];
                    $to_user = $result['poetid'];
                     ?></a></h4>



			    					<hr class="bg-dark w-75 " style="color: black;">
			    					
			    				
			    					<center>
			    					<p style=" overflow: hidden; width: 230px; "><?php echo $result['textt']; ?></p></center>
									<hr class="bg-dark w-75 " style="color: black;">
                  <p>Posted on <span class="text-warning"><?php echo $result['dateonly']; ?></span></p>	
								<br><br>
                </div>
                </div>
			    		
				
                <br>
<div class="col-lg-3 my-4">
<div class="likes bg-white mb-2 p-3" style="border: 1px solid black;">
<h4>Like </h4>

<?php
// echo $id;
$result4 = mysqli_query($con, "SELECT * FROM likestbl WHERE user = '$username' AND post = '$id'");
if (mysqli_num_rows($result4) == 1) {?>

  <a href="" class="unlike" id="<?php echo $id; ?>"><i class="fa fa-lg fa-heart"></i></a><br>
<?php echo $total_likes;?>
  <?php 
}
else {?>

  <a href="" class="like" id="<?php echo $id; ?>"><i class="far fa-lg fa-heart"></i></a><br>
<?php echo $total_likes;?>
<?php 

}
 ?>
                
                
</div>
<br>
<div class="border">

                <div class="form bg-white py-3">
                  <form action="" method="post">
                  <h4>Comments</h4>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="poem" value="<?php echo $title_poem; ?>">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="poem_id" value="<?php echo $id; ?>">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="poet" value="<?php echo $from_user; ?>">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="to_user" value="<?php echo $to_user; ?>">
                      </div>
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="idshow" value="<?php echo $show; ?>">
                      </div>
                      <div class="form-group">
                        <textarea name="comment" placeholder="Comment" name="comment" class="text-center form-control " id="" cols="30" resize="none" rows="2"></textarea>
                      </div>
                    <button class="btn btn-outline-warning" type="submit" name="submit">Submit</button>
                  </form>
                </div>
                

</div>

</div>
<?php } 

               ?>
<div class="col-lg-12 col-sm-12 bg-light">
All Comments
</div>


<div class=" container ">
<?php
						$con = mysqli_connect('localhost', 'root', '');
			    		mysqli_select_db($con, 'thoughts');
					
						$query_c = "SELECT `cid`, `comment`, `poet`, `post`, `c_time` FROM `comment` WHERE post = '$id' ORDER BY cid DESC ";
			    		$comment_query = mysqli_query($con, $query_c);
			    		 while ( $comments = mysqli_fetch_assoc($comment_query)) {
                  ?>
                  
                  <center>
                 <div class="list  container bg-warning my-3 p-3 rounded">
                  <span style="float: left;"><?php echo $comments['c_time']; ?></span><br>

                    <p style="font-size: 20px;" class="text-white"><?php echo $comments['comment']; ?></p>
                     by:
                    <span class="text-dark"> <a class="text-dark" href="profileshow.php?id=<?php echo $show; ?>"><?php echo $comments['poet']; ?></a></span>
                   </div>
                 </center>



<?php }

?>

</div>
</div>
</div></div>
</center>
</center>

<section class=" text-white text-center py-4 bg-warning fixed" style="background:;">
	<div class="mb-5 ">
		<h2>Express What You Feel</h2>
		<h6>Find The Person Inside You</h6>

		
	</div>
	<p class="text-center font-weight-bold ">DESIGN AND BUILD BY <a class="text-white " style="text-decoration: underline;" href="https://asmerfire.web.app/"> ASMER CHOUGLE</a></p>
</section>

<!-- modal  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('.like').click(function(){
          var postid = $(this).attr('id');
          $.ajax({
              url: 'like_manage.php',
              type: 'post',
              async: false,
              data: {
                'liked': 1,
                'post': postid
              },
              success:function(){

              }
          });
      });
       $('.unlike').click(function(){
          var postid = $(this).attr('id');
          $.ajax({
              url: 'like_manage.php',
              type: 'post',
              async: false,
              data: {
                'unliked': 0,
                'post': postid
              },
              success:function(){

              }
          });
      });
  });
</script>
</body>
</html>





