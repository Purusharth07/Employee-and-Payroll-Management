<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("db.php")
?>

<?php
  $query  = mysql_query("SELECT * from overtime");
  while($row=mysql_fetch_array($query))
  {
    @$rate = $row['rate'];
  }

  $query  = mysql_query("SELECT * from salary");
  while($row=mysql_fetch_array($query))
  {
    @$salary           = $row['salary_rate'];
  }
  
  $query  = mysql_query("SELECT * from deductions");
  
  
  //print_r($_SESSION);
  //die();
  
  while($row=mysql_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $philhealth   = $row['philhealth'];
    $bir          = $row['bir'];
    $gsis         = $row['gsis'];
    $love         = $row['pag_ibig'];
    $loans        = $row['loans'];
	$leave_rate   = $row['leave_rate'];

    //$total        = $philhealth + $bir + $gsis + $love + $loans + ($leave_rate*$totoalNumberOfLeaves);
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
          <b><a href="index.php">Employee Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Employee</a>
            </li>
            <li>
              <a href="home_deductions.php">Deduction/s</a>
            </li>
            <li class="active">
              <a href="">Income</a>
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
                <button type="button" data-toggle="modal" data-target="#overtime" class="btn btn-success">Modify Overtime Rate</button>
                <button type="button" data-toggle="modal" data-target="#salary" class="btn btn-primary">Modify Salary Rate</button>
                <p class="pull-right">Overtime rate per hour: <big><b><?php echo $rate; ?>.00</b></big></p><br>
                <p class="pull-right">Salary rate: <big><b><?php echo $salary; ?>.00</b></big></p>
                <p align="center"><big><b>Salary</b></big></p>
                <div class="table-responsive">
                  <form method="post" action="" >
                    <table class="table table-bordered table-hover table-condensed" id="myTable">
                      <!-- <h3><b>Ordinance</b></h3> -->
                      <thead>
                        <tr class="info">
                          <th><p align="center">Name</p></th>
						  <th><p align="center">Basic Pay</p></th>
                          <th><p align="center">Deduction</p></th>
                          <th><p align="center">Overtime</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $query  = mysql_query("SELECT * from overtime");
                          while($row=mysql_fetch_array($query))
                          {
                            $rate   = $row['rate'];
                          }

                          $query  = mysql_query("SELECT * from salary");
                          while($row=mysql_fetch_array($query))
                          {
                            $salary_rate   = $row['salary_rate'];
                          }

                          $query  = mysql_query("SELECT * from employee");
                          while($row=mysql_fetch_assoc($query))
                          {
							  $emp_id = $row['emp_id'];
							  $basic_pay = $row['basic_pay'];
                            $lname           = $row['lname'];
                            $fname           = $row['fname'];
                            $deduction       = $row['deduction'];
                            $overtime        = $row['overtime'];
                            $bonus           = $row['bonus'];

                            $over     = $row['overtime'] * $rate;
                            $bonus     = $row['bonus'];
                            $deduction  = $row['deduction'];
                            $income   = $basic_pay + $over + $bonus;
              
						 $query22 = "SELECT sum(days) from leave_details where status='approved' and emp_id=$emp_id";
						  $results1 = mysql_query($query22) or die(mysql_error());
						  $row = mysql_fetch_array($results1);
						  $total1 = $row[0];
							echo $total1;
  
							$totoalNumberOfLeaves = intval($total1);
									
			  
			  
			  
			  
			  
			  
							$total        = ($philhealth + $bir + $gsis + $love + $loans)*$basic_pay + ($leave_rate*$totoalNumberOfLeaves);
							
							
							
							
							$netpay   = $income - $total;
							
							
							
                        ?>
                        <tr>
                          <td align="center"><?php echo $lname?>, <?php echo $fname?></td>
						  <td align="center"><big><b><?php echo $basic_pay?></b></big></td>
                          <td align="center"><big><b><?php echo $total?></b></big></td>
                          <td align="center"><big><b><?php echo $overtime?></b></big> hrs</td>
                          <td align="center"><big><b><?php echo $bonus?></b></big></td>
                          <td align="center"><big><b><?php echo $netpay?></b></big></td>
                        </tr>
                        <?php } ?>
                      </tbody>

                        <tr class="info">
                          <th><p align="center">Name</p></th>
						  <th><p align="center">Basic Pay</p></th>
                          <th><p align="center">Deduction</p></th>
                          <th><p align="center">Overtime</p></th>
                          <th><p align="center">Bonus</p></th>
                          <th><p align="center">Net Pay</p></th>
                        </tr>
                    </table>
                  </form>
                </div>
              </fieldset>
            </form>
          </div>

      <!-- this modal is for OVERTIME -->
      <div class="modal fade" id="overtime" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Overtime</b></big> rate per hour.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_overtime.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="rate" class="form-control" value="<?php echo $rate; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for SALARY -->
      <div class="modal fade" id="salary" role="dialog">
        <div class="modal-dialog modal-sm">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">Enter the amount of <big><b>Salary</b></big> rate.</h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="update_salary.php" name="form" method="post">
                <div class="form-group">
                    <input type="text" name="salary_rate" class="form-control" value="<?php echo $salary; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
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