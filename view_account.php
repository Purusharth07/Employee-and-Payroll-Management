<?php
  include("db.php"); //include auth.php file on all secure pages
  include("auth.php");

  $sql = mysql_query("SELECT * from deductions WHERE deduction_id='1'");
  while($row = mysql_fetch_array($sql))
  {
    $phil = $row['philhealth'];
    $bir = $row['bir'];
    $gsis = $row['gsis'];
    $love = $row['pag_ibig'];
    $loans = $row['loans'];
	
    $total        = $phil + $bir + $gsis + $love + $loans;
	
	
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
      </div><br><br>

      <?php
        $id=$_REQUEST['emp_id'];
        $query = "SELECT * from employee where emp_id='".$id."'";
        $result = mysql_query($query) or die ( mysql_error());

        $query  = mysql_query("SELECT * from overtime");
        while($row=mysql_fetch_array($query))
        {
          $rate   = $row['rate'];
        }

        $query  = mysql_query("SELECT * from salary");
        while($row=mysql_fetch_array($query))
        {
          $salary   = $row['salary_rate'];
        }

        while ($row = mysql_fetch_assoc($result))
        {
            $overtime     = $row['overtime'] * $rate;
            $bonus     = $row['bonus'];
            $deduction  = $row['deduction'];
            $income   = $overtime + $bonus + $salary;
            $netpay   = $income - $deduction;
          ?>

              <form class="form-horizontal" action="update_account.php" method="post" name="form">
                <input type="hidden" name="new" value="1" />
                <input name="id" type="hidden" value="<?php echo $row['emp_id'];?>" />
				<div class="well bs-component">
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <h2><?php echo $row['lname']; ?>, <?php echo $row['fname']; ?></h2>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Deduction/s  :</label>
                    <div class="col-sm-4">
                    
                      <?php echo $total;?>
                      
                    
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Overtime  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="overtime" class="form-control" value="<?php echo $row['overtime'];?>" required="required">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label">Bonus  :</label>
                    <div class="col-sm-4">
                      <input type="text" name="bonus" class="form-control" value="<?php echo $row['bonus'];?>" required="required">
                    </div>
                  </div>
				  <div class="form-group">
                    <label class="col-sm-5 control-label">Days of Leave  :</label>
                    <div class="col-sm-4">
                      <?php
						include('db.php');
						
						$emp_id=$_GET['emp_id'];
						 $query = "SELECT sum(days) from leave_details where status='approved' and emp_id=$emp_id";
						  $results1 = mysql_query($query) or die(mysql_error());
						  $row = mysql_fetch_array($results1);
						  $total1 = $row[0];
							echo $total1;
                      ?>
                    </div>
                  </div>
				  <br><br>

                  <!--<div class="form-group">
                    <label class="col-sm-5 control-label">Netpay  :</label>
                    <div class="col-sm-4">
                      <?php echo $netpay;?>.00
                    </div>
                  </div>-->
				  <br><br>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"></label>
                    <div class="col-sm-4">
                      <input type="submit" name="submit" value="Update" class="btn btn-danger">
                      <a href="home_employee.php" class="btn btn-primary">Cancel</a>
                    </div>
                  </div>
              </form>
            <?php
          }
        ?>

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