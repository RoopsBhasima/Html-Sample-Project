<?php 
		include('../dbcon.php');
		
		$id = $_REQUEST['sid'];

		$query = "DELETE FROM `student` WHERE `id` = '$id'";

		$run = mysqli_query($con,$query);

		if ($run == TRUE) {
			?>
			<script>
				alert("Data Deleted successfully");
				window.open('deletestudent.php','_self');
			</script>
			<?php
		}else{
			?>
			<script>
				alert("ERROR!!");
			</script>
			<?php
		}	

 ?>