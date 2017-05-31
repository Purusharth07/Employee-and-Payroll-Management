<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");

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
	<script>
		
				function formValidation()  
				{  
					var zip=document.form.zip.value; 
					var contact=document.form.contact.value; 
					var city=document.form.city.value;
					var country=document.form.country.value;
					var address=document.form.address.value;
					var x=document.form.email.value;  
					var atposition=x.indexOf("@");  
					var dotposition=x.lastIndexOf("."); 
						
					if (isNaN(zip) || zip.length!=6)
					{  
						alert("Enter valid zip");  
						return false;  
					}
					if (isNaN(contact) || contact.length!=10)
					{  
						alert("Enter valid contact number");  
						return false;  
					}
					if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
					{  
						alert("Please enter a valid e-mail address");  
						return false;  
                    }
					if (!isNaN(city))
					{  
						alert("City should be letters only");  
						return false;  
					}
					if (!isNaN(country))
					{  
						alert("Country should be letters only");  
						return false;  
					}
					if (!alphanumeric(address))
					{  
						alert("Address must be alphanumeric");  
						return false;  
					}
					
					return true;
				}
					
				

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
          <b><a href="index.php">Employee Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li class="active">
              <a href="">Employee</a>
            </li>
            <li>
              <a href="home_deductions.php">Deduction/s</a>
            </li>
            <li>
              <a href="home_salary.php">Income</a>
            </li>
			<li>
              <a href="admin_leave.php">Leave/s</a>
            </li>
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <button type="button" data-toggle="modal" data-target="#addEmployee" class="btn btn-success">Add New</button>
                <p align="center"><big><b>List of Employees</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Action</p></th>
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
                          
                          $query=mysql_query("select * from employee")or die(mysql_error());
                          while($row=mysql_fetch_array($query))
                          {
                            $id     =$row['emp_id'];
                            $lname  =$row['lname'];
                            $fname  =$row['fname'];
                            $type   =$row['emp_type'];
                            $deduction   =$row['deduction'];
                            $overtime   =$row['overtime'];
                            $bonus   =$row['bonus'];
                        ?>

                        <tr>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $lname ?>,  <?php echo $row['fname'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['gender'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['emp_type'] ?></a></td>
                          <td align="center"><a href="view_employee.php?emp_id=<?php echo $row["emp_id"]; ?>" title="Update"><?php echo $row['division'] ?></a></td>
                          <td align="center">
                            <a class="btn btn-primary" href="view_account.php?emp_id=<?php echo $row["emp_id"]; ?>">Account</a>
                            <a class="btn btn-danger" href="delete.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a>
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
                          <th><p align="center">Name</p></th>
                          <th><p align="center">Gender</p></th>
                          <th><p align="center">Employee Type</p></th>
                          <th><p align="center">Department</p></th>
                          <th><p align="center">Action</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an EMPLOYEE -->
      <div class="modal fade" id="addEmployee" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Employee</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label">Lastname</label>
                  <div class="col-sm-8">
                    <input type="text" name="lname" class="form-control" placeholder="Lastname" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Firstname</label>
                  <div class="col-sm-8">
                    <input type="text" name="fname" class="form-control" placeholder="Firstname" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Gender</label>
                  <div class="col-sm-8">
                    <select name="gender" class="form-control" placeholder="Gender" required>
                      <option value="">Gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-4 control-label">Contact</label>
                  <div class="col-sm-8">
                    <input type="text" name="contact" class="form-control" placeholder="Contact" required="required">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                    <input type="text" name="email" class="form-control" placeholder="Email" required="required">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">DOB</label>
                  <div class="col-sm-8">
                    <input type="date" name="dob" class="form-control" placeholder="DOB" required="required">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">Join Date</label>
                  <div class="col-sm-8">
                    <input type="date" name="jdate" class="form-control" placeholder="Jdate" required="required">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">City</label>
                  <div class="col-sm-8">
                    <input type="text" name="city" class="form-control" placeholder="City" required="required">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">Zip</label>
                  <div class="col-sm-8">
                    <input type="text" name="zip" class="form-control" placeholder="Zip" id="zip">
                  </div>
                </div>
				                <div class="form-group">
                  <label class="col-sm-4 control-label">Country</label>
                  <div class="col-sm-8">
                    <input type="text" name="country" class="form-control" placeholder="Country" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Employee Type</label>
                  <div class="col-sm-8">
                    <select name="emp_type" class="form-control" placeholder="Employee Type" required>
                      <option value="">Employee Type</option>
                      <option value="Job Order">Job Order</option>
                      <option value="Regular">Regular</option>
                      <option value="Casual">Casual</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Division</label>
                  <div class="col-sm-8">
                    <select name="division" class="form-control" placeholder="Division" required>
                      <option value="">Division</option>
                      <option value="Admin">Admin</option>
                      <option value="Human Resource">Human Resource</option>
                      <option value="Accounting">Accounting</option>
                      <option value="Engineering">Engineering</option>
                      <option value="MIS">MIS</option>
                      <option value="Supply">Supply</option>
                      <option value="Maintenance">Maintenance</option>
                      <option value="Control">Control</option>
                    </select>
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                  </div>
                </div>
				 <div class="form-group">
                  <label class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-sm-4 control-label">Basic Pay</label>
                  <div class="col-sm-8">
                    <input type="text" name="basic_pay" class="form-control" placeholder="BasicPay">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit" onclick="return formValidation()">
                    <input type="reset" name="" class="btn btn-danger" value="Clear Fields">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
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
    <script src="assets/js/search.js"></script>
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