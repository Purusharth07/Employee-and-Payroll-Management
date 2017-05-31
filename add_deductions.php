<?php
	
		require("db.php");
		
		@$id 			= $_POST['deduction_id'];
		@$philhealth 	= $_POST['philhealth'];
		@$bir 			= $_POST['bir'];
		@$gsis 			= $_POST['gsis'];
		@$love 			= $_POST['pag_ibig'];
		@$loans 		= $_POST['loans'];
		@$leave_rate    = $_POST['leave_rate'];
		


		$sql = mysql_query("UPDATE deductions SET bir='$bir', gsis='$gsis', pag_ibig='$love', loans='$loans', philhealth='$philhealth', leave_rate='$leave_rate' WHERE deduction_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('Deductions successfully updated...');
		            window.location.href='home_deductions.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>