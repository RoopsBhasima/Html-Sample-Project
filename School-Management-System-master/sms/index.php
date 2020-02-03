<!DOCTYPE html>
<html>
<head>
	<title>School Management System</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<style type="text/css">
		.heading{
			color: #fff;
		}
		td.img {
		    padding:22px;
		}
		td {
		    padding: 5px 25px 5px 25px;
		    font-size: 19px;
		}
		.text input[type="text"]{
			border-bottom: 1.5px solid #333;
		}
		input[type="text"] {
		    font-size: 19px;
		    border: none;
		}
		input[type="number"] {
		    font-size: 19px;
		    border: none;
		    outline: none;
		}
	</style>
</head>
<body>
	<div class="heading">
		<h1>Welcome to the School Management System</h1>
	</div>
	<div class="box">
		<a href="login.php" class="left-box">Login</a>
	</div>
	<form method="post" action="index.php">
		<table>
			<tr>
				<td colspan="2" class="text-center">Student Information</td>
			</tr>
			<tr class="text">
				<td>Enter Name</td>
				<td><input type="text" name="name" placeholder="Enter Student name" required="required"></td>
			</tr>
			<tr>
				<td>Chose Standard</td>
				<td>
					<select>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" class="text-center"><input type="submit" name="submit" value="submit" class="submit"></td>
			</tr>
		</table>
	</form>


	
</body>
</html>

<?php 

	include('dbcon.php');
	if (isset($_POST['submit'])) {
		
		$name = $_POST['name'];

		$query = "SELECT * FROM `student` WHERE `name` LIKE '%$name%'";

		$run = mysqli_query($con,$query);

		$row = mysqli_num_rows($run);

		if ($row<1) {
			?>
			<script>
				alert("Data not found");
			</script>
			<?php
		}
		else
		{
			while ($data = mysqli_fetch_assoc($run)) {
				?>
				<table>
					<tr>
						<td colspan="3" class="heading"><h2>Student Information</h2></td>
					</tr>
					<tr>
						<td rowspan="5" class="img"><img src="dataimage/<?php echo $data['image']; ?>" style="max-width: 100px;"></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="name" value="<?php echo $data['name']; ?>"></td>
					</tr>
					<tr>
						<td>Roll No</td>
						<td><input type="number" name="roll" value="<?php echo $data['roll no'] ?>"></td>
					</tr>
					<tr>
						<td>Address</td>
						<td><input type="text" name="address" value="<?php echo $data['Address'] ?>"></td>
					</tr>
					<tr>
						<td>Standard</td>
						<td><input type="text" name="stand" value="<?php echo $data['Standard'] ?>"></td>
					</tr>
				</table>
				<?php
			}
		}

	}

 ?>