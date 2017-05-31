<?php 

  include("db.php");
  include("auth.php");
	$emp_id=$_SESSION['emp_id'];//null;
	 //if(isset($_POST['submit']))
	//{
	//  $emp_id=$_POST['emp_id'];
    //}
						  
	$emp_id=$_SESSION['emp_id'];//null;
  //$id         = $_POST['id'];
   $city= $_POST['city'];
  $address=$_POST['address'];
  $zip = $_POST['zip'];
  
  $country = $_POST['country'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  
  $query1 = "UPDATE employee SET address='$address', contact='$contact', email='$email', zip='$zip', city='$city', country='$country' WHERE emp_id=$emp_id";
//die($queryy1);
  $sql = mysql_query($query1);
	
  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
     window.location.href='employee_home.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      //window.location.href='employee_home.php';
    </script>
    <?php 
  }
?>