<?php 

  include("db.php");
  include("auth.php");

  $id         = $_POST['id'];
   /*$city= $_POST['city'];
  $address=$_POST['address'];
  $zip = $_POST['zip'];
  
  $country = $_POST['country'];*/
 
  $division   = $_POST['division'];
  $emp_type   = $_POST['emp_type'];
  $basic_pay  = $_POST['basic_pay'];

  $sql = mysql_query("UPDATE employee SET emp_type='$emp_type', division='$division', basic_pay='$basic_pay' WHERE emp_id='$id'");

  if ($sql)
  {
    ?>
    <script>
      alert('Employee successfully updated.');
      window.location.href='home_employee.php';
    </script>
    <?php 
  }
  else
  {
    ?>
    <script>
      alert('Invalid action.');
      //window.location.href='home_home.php';
    </script>
    <?php 
  }
?>