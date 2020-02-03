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
 		.table-update{
		border: 1px solid #333;
		border-collapse: collapse;
		width: 75%;
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
		width:150px;
	}
	.roll{
		width:115px;
	}
	.address{
		width:145px;
	}
	.standard{
		width: 145px;
	}

	.bg-color{
		background-color: #333;
		color: #ffffff;
		/*opacity: 0.8;*/
	}
	.bg-color td{
		border: 1px solid #fff;
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
		<a href="admindash.php" class="left-box">Back</a>
	</div>

	<form method="post" action="updatastudent.php">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" placeholder="Enter student name"></td>
				<td><input type="submit" name="submit" value="showinfo" class="submit"></td>
			</tr>
		</table>
	</form>

	<table class="table-update bg-color">
	 	<tr>
	 		<td class="no">No</td>
	 		<td class="img">Image</td>
	 		<td class="name">Name</td>
	 		<td class="roll">Roll no</td>
	 		<td class="address">Address</td>
	 		<td class="standard">Standard</td>
	 		<td class="edit">Edit</td>
	 	</tr>
 	</table>
 </body>
 </html>

 <?php 
 	include('../dbcon.php');
 	if (isset($_POST['submit'])) {
 		
 		$name = $_POST['name'];

 		$query = "SELECT * FROM `student` WHERE `name` LIKE '%$name%'";

 		$run = mysqli_query($con,$query);

 		$row = mysqli_num_rows($run);

 		if ($row<1) {
 			?>
 			<script>
 				alert("no value foudn");
 			</script>
 			<?php
 		}
 		else
 		{
 			$count = 0;
 			while ($data = mysqli_fetch_assoc($run)) {
 				$count++;
 				?>
 				<table class="table-update">
				 	<tr>
				 		<td class="no"><?php echo $count; ?></td>
				 		<td class="img"><img src="../dataimage/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
				 		<td class="name"><?php echo $data['name']; ?></td>
				 		<td class="roll"><?php echo $data['roll no']; ?></td>
				 		<td class="address"><?php echo $data['Address']; ?></td>
	 					<td class="standard"><?php echo $data['Standard']; ?></td>
				 		<td class="edit"><a href="updataform.php?sid=<?php echo $data['id'] ?>">Edit</a></td>
				 	</tr>
			 	</table>
 				<?php
 			}
 		}

 	}

  ?>