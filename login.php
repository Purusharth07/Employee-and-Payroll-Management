<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
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
    <link rel="stylesheet" href="assets/css/login.css">

</head>


<body class="hold-transition login-page">
<?php
  require('db.php');
  session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['username']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = stripslashes($username);
        $username = mysql_real_escape_string($username);

        $password = stripslashes($password);
        $password = mysql_real_escape_string($password);

        //Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
        $result = mysql_query($query) or die(mysql_error());
        $rows = mysql_num_rows($result);
		$query1 = "SELECT * FROM `employee` WHERE username='$username' and password='$password'";
        $result1 = mysql_query($query1) or die(mysql_error());
        $rows1 = mysql_num_rows($result1);
		
		
        if($rows==1)
        {
          $_SESSION['username'] = $username;
          header("Location: index.php");
        }
        
		
		
		
		if($rows1==1)
        {
			$row = mysql_fetch_assoc($result1);
			$emp_id = $row['emp_id'];
          $_SESSION['username'] = $username;
		  $_SESSION['password'] = $password;
		  $_SESSION['emp_id'] = $emp_id;
          header("Location: index1.php");
        }
        else
        {
          ?>
          <script>
            alert('Invalid Keyword, please try again.');
            window.location.href='login.php';
          </script>
          <?php
        }
    }
    else
    {
?>


<br><br><br><br><br><br><br><br>
<div class="container">
  <section id="content">
    <form action="" method="post">
      <h1>Login Form</h1>
      <div>
        <input name=username type="text" placeholder="Enter Username" required>
        <!-- <input type="text" placeholder="Username" required="" id="username" /> -->
      </div>
      <div>
        <input name=password type="password" placeholder="Enter Password" required>
        <!-- <input type="password" placeholder="Password" required="" id="password" /> -->
      </div>
      <div>
        <input type="submit" value="Log in" />
        <!-- <a href="index.php">Back to Home</a> -->
        <!-- <a href="">Forgot password?</a> -->
      </div>
    </form><!-- form -->
  </section><!-- content -->
</div><!-- container -->


<?php } ?>


  </body>
</html>