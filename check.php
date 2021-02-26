<?php
    session_start();
    error_reporting(0);
    include 'scripts.php';

    $con = mysqli_connect('localhost', 'root', '');
    
    mysqli_select_db($con, 'thoughts');

    
    $user = $_POST['username'];
    $pass2 = $_POST['psw2'];
    // $pass2 = md5('psw2');

    $_SESSION['name'] = $user;
    $q = " select * from poetscd where uname = '$user' && psw = '$pass2' ";
    $result = mysqli_query($con, $q);
            
    $id = $_GET['username'];
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        
        $row = mysqli_fetch_array($result);
        $_SESSION['email'] = $row['email'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $id;
        header('location:main.php');
        
        
    }
    else{
     echo "<script>error();</script>";
     // echo "<script>window.location = 'index.php';</script>";
     
    }


?>
<?php
if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["username"]) && empty($_POST["password"]))  
      {  
           echo '<script>alert("Both Fields are required")</script>';  
      }  
      else  
      {  
           $id = $_GET['id'];
           $username = mysqli_real_escape_string($connect, $_POST["username"]);  
           $password = mysqli_real_escape_string($connect, $_POST["password"]);  
           $password = md5($password);  
           $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) > 0)  
           {  
                $_SESSION['username'] = $username;  
                $_SESSION['id'] = $id;  
                echo "<script>window.location.href = 'main.php'</script>";
           }  
           else  
           {  
                echo '<script>error();</script>';  
                // echo "<script>window.location.href = 'index.php'</script>";  
           }  
      }  
 }  
 ?>  

<script language="javascript" type="text/javascript">
		function removeSpaces1(string) {
		return string.split(' ').join('');
		};
    function error(argument) {
      toastr.success('username already exist',{timeout:5000});
    
    };
	</script>