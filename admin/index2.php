<?php 
	session_start();
?>





<section>




<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
  	#hover:hover{
  		display: block;
  		padding: 10px;

  	}
  	.main-item{
  		height: 400px;
  	}
  </style>
</head>
<body>
<header>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top mb-5">
  <a class="navbar-brand" href="#">Thoughts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    
  </div>  
</nav>
</header>
<br><br><br>
<div class="container-fluid text-center  ">
  <h5>Create Your Own Thoughts.</h5>
  <p>Be The change.</p>
  <hr class="w-75 bg-dark">
  
</div>
<section class="container">
  <div class="row">
    <div class="col-lg-3 col-sm-12">
     <div class="bg-primary text-light text-center rounded my-3 p-5">
      <?php 
        $con = mysqli_connect('localhost', 'root', '');
          mysqli_select_db($con, 'thoughts');


            $query = "SELECT * FROM `poetscd` WHERE 1"; 
              
            // Execute the query and store the result set 
            $result = mysqli_query($con, $query); 
              
            if ($result) 
            { 
                // it return number of rows in the table. 
                $row = mysqli_num_rows($result); 
                  
                  if ($row) 
                      { 
                        ?>
                        <h4>Total user's: <?php echo $row; ?></h4> 
                        <?php 
                      } 
                // close the result. 
                mysqli_free_result($result); 
            } 
        ?>
      </div>
    </div>
<!--  -->
    <div class="col-lg-3 col-sm-12">
          <div class="bg-success text-light text-center my-3 rounded p-5">
          <?php 
            $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');


                $query = "SELECT * FROM `writescd` WHERE 1"; 
                  
                // Execute the query and store the result set 
                $result = mysqli_query($con, $query); 
                  
                if ($result) 
                { 
                    // it return number of rows in the table. 
                    $row = mysqli_num_rows($result); 
                      
                      if ($row) 
                          { 
                            ?>
                            <h4>Total posts: <?php echo $row; ?></h4> 
                            <?php 
                          } 
                    // close the result. 
                    mysqli_free_result($result); 
                } 
            ?>
          </div>
        </div>  <!--  -->
        <div class="col-lg-3 col-sm-12">
          <div class="bg-warning text-light text-center rounded my-3 p-5">
                <a href="users.php"><button class="btn btn-outline-light">search user</button></a>
          </div>
        </div>

        <div class="col-lg-3 col-sm-12">
          <div class="bg-dark text-light text-center rounded my-3 p-5">
               <a href="posts.php"><button class="btn btn-outline-light">search post</button></a>
          </div>
        </div>

        <div class="col-lg-6 col-sm-12">
          <div class="bg-danger text-light text-center rounded my-3 p-5">
          <?php 
            $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
                
              $source = date('Y-m-d H:i:s');
              $date = new DateTime($source);
              $newdate = $date->format('Y.m.d'); 
               ?>

               <?php
   
                $query = "SELECT `id`, `title`, `poetid`, `textt`, `dateonly`, `foreginkey` FROM `writescd` WHERE dateonly = '$newdate' "; 
                  
                // Execute the query and store the result set 
                $result = mysqli_query($con, $query); 
                  
                if ($result) 
                { 
                    // it return number of rows in the table. 
                    $row = mysqli_num_rows($result); 
                      
                      if ($row == 1) 
                          { 
                            ?>
                            <h4>Total post added today: <?php echo $row; ?></h4> 
                            <?php
                          } 
                          elseif($row){
                            ?>
                            <h4>Total posts added today: <?php echo $row; ?></h4> 
                            <?php
                          }
                          else{
                            ?>
                            <h4>No posts added today </h4> 
                            <?php
                          }
                    // close the result. 
                    mysqli_free_result($result); 
                } 
            ?>


          </div>
        </div>

        <div class="col-lg-6 col-sm-12">
          <div class="bg-info text-white text-center rounded my-3 p-5">
          <?php 
            $con = mysqli_connect('localhost', 'root', '');
              mysqli_select_db($con, 'thoughts');
                
              $source = date('Y-m-d H:i:s');
              $date = new DateTime($source);
              $newdate = $date->format('Y.m.d'); 
               ?>

               <?php
   
                $query = "SELECT * FROM `poetscd` WHERE dateonly = '$newdate' "; 
                  
                // Execute the query and store the result set 
                $result = mysqli_query($con, $query); 
                  
                if ($result) 
                { 
                    // it return number of rows in the table. 
                    $row = mysqli_num_rows($result); 
                      
                      if ($row == 1) 
                          { 
                            ?>
                            <h4>Total user added today: <?php echo $row; ?></h4> 
                            <?php
                          } 
                          elseif($row){
                            ?>
                            <h4>Total users added today: <?php echo $row; ?></h4> 
                            <?php
                          }
                          else{
                            ?>
                            <h4>No user added today </h4> 
                            <?php
                          }
                    // close the result. 
                    mysqli_free_result($result); 
                } 
            ?>


          </div>
        </div>

<div class="col-lg-12 col-sm-12 ">
<div class="bg-danger rounded">

</div>
</div>

      </div>
</section>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
