<?php 
	session_start();
?>





<section>




<!DOCTYPE html>
<html>
<head>
	<title>main</title>
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
  <a class="navbar-brand" href="index2.php">Thoughts</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    
  </div>  
</nav>
</header>

<br><br><br>
	<center>
<div ><br></div>
		<form  action="search.php" method="get" class="" style="width: 300px; ">		
			
				<input type="text" name="k" class="form-control" placeholder="search title/any content " required="all required" class="mt-5 w-75" style="border-radius: 50px;" value="">
				<br>
				<input type="submit" name="submit" value="GO" class="btn btn-dark text-white text-center " style="border-radius: 20px;" >
			
			
		</form>
</center>
<div class="container">
<table class="table hover-striped text-center">
    <thead>
      <tr>
      <th></th>

        <th>Fullname</th>
        <th>username</th>
        <th>Email</th>
        <th>Delete</th>
      </tr>
    </thead>

<?php
			if (isset($_GET['k'])) {
				$con = mysqli_connect('localhost', 'root', '', 'thoughts');

				$k = $con->escape_string($_GET['k']);

				$query = $con->query("
                    SELECT `id`, `fname`, `lname`, `email`, `uname`,`dateonly` 
                    FROM `poetscd`
					WHERE email LIKE '%$k%'
					OR uname LIKE '%$k%'
				");
?>


				<?php
				if ($query->num_rows) {
					while ($r = $query->fetch_object()) {
						?>
						
<?php
				
		?>
				
           
      <tr>
      <td></td>
        <td><?php echo $r->fname; ?> <?php echo $r->lname; ?></td>
        <td> <?php echo $r->uname; ?></td>
        <td><?php echo $r->email; ?></td>
        <td><a href="delete.php?id=<?php echo $r->id; ?>"><button class="btn btn-danger">Delete</button></a> </td>
      </tr>
      </tbody>

						

<?php

    		}
    	}
    }
    			?>


</div>
				









<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
