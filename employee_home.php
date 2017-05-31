<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
  
  //$emp_id = $_SESSION['emp_id'];
  //die("SELECT * from employee WHERE emp_id=$emp_id");

  $sql = mysql_query("SELECT * from deductions WHERE deduction_id='1'");
  while($row = mysql_fetch_array($sql))
  {
    $phil = $row['philhealth'];
    $bir = $row['bir'];
    $gsis = $row['gsis'];
    $love = $row['pag_ibig'];
    $loans = $row['loans'];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Employee Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index1.php">Employee Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b><?php echo $_SESSION['username']; ?></b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="employee_home.php">Employee</a>
            </li>
           <li>
              <a href="leave.php">Leave/s</a>
            </li>
            <li>
              <a href="employee_salary.php">Income</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
		<br>
				<br>
				<br>
				<br>
				<br>
          <div class="well bs-component">
		
				
            <form class="form-horizontal">
              <fieldset>
                
                <p align="center"><big><b>Employee Details</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
						<th><p align="center">EmpID</p></th>
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Contact</p></th>
						  <th><p align="center">Email</p></th>
						  <th><p align="center">DOB</p></th>
						  <th><p align="center">Join Date</p></th>
						  
						  <th><p align="center">Address</p></th>
						  <th><p align="center">City</p></th>
						  <th><p align="center">Zip</p></th>
						  <th><p align="center">Country</p></th>
						  <th><p align="center">Username</p></th>
						  <th><p align="center">Password</p></th>
                        </tr>
                      </thead>
                      <tbody>
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
						  
						  //session_start();
							$emp_id=$_SESSION['emp_id'];//null;
						  //if(isset($_POST['submit']))
						  //{
							//  $emp_id=$_POST['emp_id'];
						  //}
						  
						  $emp_id=$_SESSION['emp_id'];//null;
						  
                          
                          $query=mysql_query("SELECT * from employee WHERE emp_id=$emp_id")or die(mysql_error());
						  //die("SELECT * from employee WHERE emp_id=$emp_id");
                          while($row=mysql_fetch_array($query))
                          {
                            $lname      = $row['lname'];
							$fname      = $row['fname'];
							$gender     = $row['gender'];
							$contact    = $row['contact'];
							$email      = $row['email'];
							$dob        = $row['dob'];
							$jdate      = $row['jdate'];
							$address = isset($row['address']) ? $row['address'] : '';
							$city       = $row['city'];
							$zip        = $row['zip'];
							$country    = $row['country'];
							$type       = $row['emp_type'];
							$division   = $row['division'];
							$password   = $row['password'];
							$username   = $row['username'];
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_id'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['lname'] ?>,  <?php echo $row['fname'] ?></a></td>
                          <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                          <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_type'] ?></a></td>
                          <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['contact'] ?></a></td>
                          <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['email'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['dob'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['jdate'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['city'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['zip'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['country'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['username'] ?></a></td>
						  <td align="center"><a href="view_employee1.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['password'] ?></a></td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>
		 <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>