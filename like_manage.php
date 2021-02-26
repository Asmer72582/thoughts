<?php 
session_start();
  $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');

  $name = $_SESSION['email'];
$photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
            $user = $result['uname'];

	}
 
 



if (isset($_POST['liked'])) {


  $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
            	$from_user = $result['uname'];

  			}
  $postid = $_POST['post'];
  $r = mysqli_query($con, "SELECT * FROM writescd WHERE id=$postid");
  $row = mysqli_fetch_array($r);
  $n = $row['likes'];

  mysqli_query($con, "UPDATE writescd SET likes=$n+1 WHERE id=$postid");


            $photo2 = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey`, `bookmark`, `likes` FROM `writescd` WHERE id = '$postid' ";
            $query2 = mysqli_query($con, $photo2);


               while ( $result2 = mysqli_fetch_assoc($query2)) {
               		$touser = $result2['poetid'];
               		$poem_title = $result2['title'];
                  $id_post = $result2['id'];
                }
if ($touser == $user) {
	$ins1 = mysqli_query($con, "INSERT INTO likestbl(user, post) VALUES('$user', $postid)");
}
else{
	  $ins1 = mysqli_query($con, "INSERT INTO likestbl(user, post) VALUES('$user', $postid)");
		  if ($ins1==1) {
		    $insert = "INSERT INTO `notifications`(`from_user`, `to_user`, `post_id`, `status`, `id_post`) 
		    VALUES('$from_user', '$touser', '$poem_title', '0', '$postid')";
		    mysqli_query($con, $insert);
		  }
    // echo "<script>toastr.success('poem liked',{timeout:2000});</script>";
      
	}
}	

if (isset($_POST['unliked'])) {
  $postid = $_POST['post'];
  $r = mysqli_query($con, "SELECT * FROM writescd WHERE id=$postid");
  $row = mysqli_fetch_array($r);
  $n = $row['likes'];

  mysqli_query($con, "DELETE FROM likestbl WHERE post='$postid' AND user='$user'");
  mysqli_query($con, "UPDATE writescd SET likes=$n-1 WHERE id=$postid");

  
}
echo $touser;
echo $postid;

?>

