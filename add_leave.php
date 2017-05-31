	<?php
	include('db.php');
	
	
  $conn = @mysql_connect('localhost', 'root', '');
  if (!$conn)
  {
    die("Database Connection Failed" . mysql_error());
  }

  $select_db = mysql_select_db('payroll');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysql_error());
  }

  session_start();
  $emp_id=$_SESSION['emp_id'];//null;
	 //if(isset($_POST['submit']))
	//{
	//  $emp_id=$_POST['emp_id'];
    //}
	
	
						  
	$emp_id=$_SESSION['emp_id'];//null;
 

  $query = "SELECT sum(days) from leave_details where status='approved' and emp_id=$emp_id";
  $results1 = mysql_query($query) or die(mysql_error());
  $row = mysql_fetch_array($results1);
  $total1 = $row[0];
  $left = 20 - $total1;
  
  
  

  if(isset($_POST['submit'])!="")
  { 

	 if($total1==20)
	{
	  ?>
        <script>
            alert('Sorry, you cannot apply leave.');
            
        </script>
      <?php 
  
    }
	if($_POST['days']>$left)
	{
		 ?>
        <script>
            alert('Choose valid number of days.');
            
        </script>
      <?php 
	}	
	else if($total1<20){
  
						
	
	
						 
						  
						   
	$days       = $_POST['days'];
	
    $reason   = $_POST['reason'];
    $type     = $_POST['type'];
	$address  = isset($_POST['address']) ? $_POST['address'] : '';
	
	
   
 
    $sql = mysql_query("INSERT into leave_details(emp_id,days,reason,type,address,status)
	VALUES('$emp_id', '$days','$reason','$type', '$address','pending')");


    if($sql)
    {
      ?>
        <script>
            alert('Leave had been successfully added.');
            
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
  }
  }
  
  
?>