<?php 
	
	include('../dbcon.php');
	$name = $_POST['name'];
	$password = $_POST['pass'];
	$id = $_POST['sid'];

	$query = "UPDATE `admin` SET`username`='$name',`password`='$password' WHERE `id` ='$id'";

	$run = mysqli_query($con,$query);

		if ($run == TRUE) {
			?>
			<script>
				alert("password Change successfully");
				window.open('../logout.php','_self');
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