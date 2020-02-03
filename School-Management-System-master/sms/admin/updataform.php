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

 <?php 

 	include('../dbcon.php');

 	$id = $_GET['sid'];

 	$query ="SELECT * FROM `student` WHERE `id`='$id'";

 	$run = mysqli_query($con,$query);

 	$data = mysqli_fetch_assoc($run);
  ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="../style/style.css">
 	<style type="text/css">
 		.table-update{
		border: 1px solid #333;
		border-collapse: collapse;
		width: 65%;
		text-align: center;
	}
	.table-update td{
		border: 1px solid #333;
		padding:7px 0 7px 0;

	}


	/**/
	.no{
		width:50px;
	}
	.img{
		width:280px;
	}
	.name{
		width:170px;
	}
	.roll{
		width:145px;
	}
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
		<a href="updatastudent.php" class="left-box">Back</a>
	</div>

	<form method="post" action="updatedata.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" value="<?php echo $data['name']; ?>" required="required"></td>
			</tr>
			<tr>
				<td>Roll no</td>
				<td><input type="number" name="roll" value="<?php echo $data['roll no']; ?>" required="required"></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="add" value="<?php echo $data['Address']; ?>" required="required"></td>
			</tr>
			<tr>
	 			<td>Standard</td>
	 			<td><input type="text" name="standard" value="<?php echo $data['Standard']; ?>"></td>
 			</tr>
			<tr>
				<td>Image</td>
				<td><input type="file" name="image1"></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
					<input type="submit" name="submit" class="submit" class="submit">
				</td>
			</tr>
		</table>
			
	</form>
</body>
</html>