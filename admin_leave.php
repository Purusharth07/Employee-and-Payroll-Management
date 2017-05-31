<?php
  include("auth.php"); //include auth.php file on all secure pages
  //include("add_leave.php");

  $sql = @mysql_query("SELECT * from deductions WHERE deduction_id='1'");
  //while($row = mysql_fetch_assoc($sql))
  //{
    //$phil = $row['philhealth'];
    //$bir = $row['bir'];
    //$gsis = $row['gsis'];
    //$love = $row['pag_ibig'];
    //$loans = $row['loans'];
  //}
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
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Employee</a>
            </li>
			<li><a href="home_deductions.php">Deduction/s</a></li>
			<li>
              <a href="home_salary.php">Income</a>
            </li>
            <li class="active">
              <a href="leave.php">Leave/s</a>
            </li>
            
          </ul>
        </nav>
      </div>

        <br>
          <div class="well bs-component">
            <form class="form-horizontal">
              <fieldset>
                <!--<button type="button" data-toggle="modal" data-target="#addLeave" class="btn btn-success">Add Leave</button>-->
                <p align="center"><big><b>Leaves</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
						  <th><p align="center">EmpID</p></th>
                          <th><p align="center">ID</p></th>
						  <th><p align="center">Days</p></th>
                          <th><p align="center">Reason</p></th>
                          <th><p align="center">Leave Type</p></th>
                          <th><p align="center">Address</p></th>
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
                          
                          $query=mysql_query("select * from leave_details order by ID desc")or die(mysql_error());
                          while($row=mysql_fetch_array($query))
                          {
                            
							$days = isset($row['days']) ? $row['days'] : '';
							$reason = isset($row['reason']) ? $row['reason'] : '';
							$type = isset($row['type']) ? $row['type'] : '';
							$address = isset($row['address']) ? $row['address'] : '';
							$status = isset($row['status']) ? $row['status'] : '';
							$emp_id = isset($row['emp_id']) ? $row['emp_id'] : '';
                        ?>

                        <tr>
						  <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['emp_id'] ?></a></td>
                          <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['ID'] ?></a></td>
						  <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['days'] ?></a></td>
                          <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['reason'] ?></a></td>
                          <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['type'] ?></a></td>
                          <td align="center"><a href="view_employee.php?ID=<?php echo $row["ID"]; ?>" title="Update"><?php echo $row['address'] ?></a></td>
                          
                          <td align="center">
                            <a class="btn btn-primary" href="approve.php?ID=<?php echo $row["ID"]; ?>">Approve</a>
                            
                          </td>  
                          </td>
                        </tr>

                        <?php } ?>
                      </tbody>
                      
                        <tr class="info">
						  <th><p align="center">EmpID</p></th>
                          <th><p align="center">ID</p></th>
						  <th><p align="center">Days</p></th>
                          <th><p align="center">Reason</p></th>
                          <th><p align="center">Leave Type</p></th>
                          <th><p align="center">Address</p></th>
						  <th><p align="center">Status</p></th>
						  
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for ADDING an LeavE -->
      <div class="modal fade" id="addLeave" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Add Leave</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="#" name="form" method="post">
			  <div class="form-group">
                  <label class="col-sm-4 control-label">EmpID</label>
                  <div class="col-sm-8">
                    <input type="text" name="emp_id" class="form-control" placeholder="EmpID" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Days</label>
                  <div class="col-sm-8">
                    <input type="text" name="days" class="form-control" placeholder="Days" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Reason</label>
                  <div class="col-sm-8">
                    <input type="text" name="reason" class="form-control" placeholder="Reason" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Leave Type</label>
                  <div class="col-sm-8">
                    <select name="type" class="form-control" placeholder="Type" required>
                      <option value="">Leave</option>
                      <option value="Sick">Sick</option>
                      <option value="Emergency">Emergency</option>
                    </select>
                  </div>
                </div>
				
				                <div class="form-group">
                  <label class="col-sm-4 control-label">Address</label>
                  <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" placeholder="Address" required="required">
                  </div>
                </div>
				                

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
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