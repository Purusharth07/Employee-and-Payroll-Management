<?php 
	require('db.php');
	
	$id=$_GET['emp_id'];
	$query = "DELETE FROM employee WHERE emp_id=$id"; 
	$result = mysql_query($query);
	if($result)
    {
      ?>
        <script>
            alert('Employee had been successfully deleted.');
            
        </script>
      <?php 
    }

    else
    {
      ?>
        <script>
            alert('Invalid.');
            
        </script>
      <?php 
    }
	header("Location: home_employee.php"); 
 ?>