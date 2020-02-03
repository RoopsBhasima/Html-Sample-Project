<?php 

	session_start();
	if ($_SESSION['uid']) {
		$id = $_SESSION['uid'];
	}
	else
	{
		header('location:login.php');
	}


 ?>

<?php 

	include('../dbcon.php');

	$id = $_GET['sid'];

	$query = "SELECT * FROM `admin` WHERE id = '$id'";

	$run = mysqli_query($con,$query);

	$data = mysqli_fetch_assoc($run);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<style type="text/css">
		input[type="password"] {
		    outline: none;
		    border: none;
		    border-bottom: 1px solid #333;
		}
	</style>
</head>
<body>
	<form method="post" action="changepassworddata.php">
		<table>
			<tr>
				<td colspan="2" class="heading"><h1>Change Password</h1></td>
			</tr>
			<tr>
				<td>New-Username:</td>
				<td><input type="text" name="name" placeholder="Enter new username"></td>
			</tr>
			<tr>
				<td>New-Password:</td>
				<td><input type="password" name="pass" placeholder="Enter your new password" required="required"></td>
			</tr>
			<tr>
				<td colspan="2" class="text-center">
					<input type="hidden" name="sid" value="<?php echo $data['id']; ?>">
					<input type="submit" name="submit" class="submit" value="Change Password">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
