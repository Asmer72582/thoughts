<?php session_start();
error_reporting(0);
$con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
              $name = $_SESSION['email'];
              $photo = "SELECT `id`, `fname`, `lname`, `email`, `uname`, `psw` FROM `poetscd` WHERE email = '$name';";
        $query = mysqli_query($con, $photo);
            while ( $result = mysqli_fetch_assoc($query)) {
           	
           	$username = $result['uname'];

           }
           $query_status = "UPDATE comment_notifications SET status = '1' WHERE to_user = '$username' ";
           mysqli_query($con, $query_status);
           $query_status = "UPDATE notifications SET status = '1' WHERE to_user = '$username' ";
           mysqli_query($con, $query_status);

?>