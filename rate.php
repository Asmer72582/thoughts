<?php 
session_start();
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
                 printf("Number of row in the table : " . $row); 
              } 
        // close the result. 
        mysqli_free_result($result); 
    } 
?>