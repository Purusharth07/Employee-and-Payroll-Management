<?php
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
  

  if(isset($_POST['submit'])!="")
  {
    $lname      = mysql_real_escape_string($_POST['lname']);
    $fname      = mysql_real_escape_string($_POST['fname']);
    $gender     = mysql_real_escape_string($_POST['gender']);
	$contact    = mysql_real_escape_string($_POST['contact']);
	$email      = mysql_real_escape_string($_POST['email']);
	$dob        = mysql_real_escape_string($_POST['dob']);
	$jdate      = mysql_real_escape_string($_POST['jdate']);
	$address = isset($_POST['address']) ? $_POST['address'] : '';
    $city       = mysql_real_escape_string($_POST['city']);
	$zip        = mysql_real_escape_string($_POST['zip']);
	$country    = mysql_real_escape_string($_POST['country']);
	$type       = mysql_real_escape_string($_POST['emp_type']);
    $division   = mysql_real_escape_string($_POST['division']);
	$password   = mysql_real_escape_string($_POST['password']);
	$username   = mysql_real_escape_string($_POST['username']);
	$basic_pay  = mysql_real_escape_string($_POST['basic_pay']);
 
    $query = "INSERT into employee(lname, fname, gender,contact,email,dob,jdate,address,city,zip,country, emp_type, division, username, password, basic_pay)
	VALUES('$lname','$fname','$gender', '$contact','$email', '$dob', '$jdate', '$address', '$city', '$zip', '$country', '$type', '$division', '$username', '$password','$basic_pay')";
	
	$sql = mysql_query($query);
	//echo $query;
	
	
    if($sql)
    {
      ?>
        <script>
            alert('Employee had been successfully added.');
            
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
?>