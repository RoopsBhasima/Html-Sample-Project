<?php 

	session_start();
	if ($_SESSION['uid']) {
		echo '';
	}
	else
	{
		header('location:../login.php');
	}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<style type="text/css">
	</style>
</head>
<body>
	<div class="heading">
		<h1>Welcome to the School Management System</h1>
	</div>
	<div class="box">
		<a href="../logout.php" class="left-box">logout</a>
	</div>
	<div class="box">
		<a href="admindash.php" class="left-box">Back</a>
	</div>

	<form method="post" action="addstudent.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" placeholder="Enter your name" required="required"></td>
			</tr>
			<tr>
				<td>Roll no</td>
				<td><input type="number" name="roll" placeholder="Enter roll no" required="required"></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="add" placeholder="Enter your Address" required="required"></td>
			</tr>
			<tr>
	 			<td>Standard</td>
	 			<td><input type="text" name="standard" placeholder="Enter your Standard"></td>
 			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image1"></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><input type="submit" name="submit" class="submit" class="submit"></td>
			</tr>
		</table>
			
	</form>
</body>
</html>

<?php 
	include('../dbcon.php');
	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$add = $_POST['add'];
		$stand = $_POST['standard'];

		$imagename = $_FILES['image1']['name'];
		$tempimage = $_FILES['image1']['tmp_name'];

		move_uploaded_file($tempimage,"../dataimage/$imagename");

		$query = "INSERT INTO `student`(`name`, `roll no`, `Address`, `Standard`, `image`) VALUES ('$name','$roll','$add','$stand','$imagename')";

		$run = mysqli_query($con,$query);

		if ($run == TRUE) {
			?>
			<script>
				alert("Data inserte successfully");
			</script>
			<?php
		}else{
			?>
			<script>
				alert("ERROR!!");
			</script>
			<?php
		}

	}
	

 ?>