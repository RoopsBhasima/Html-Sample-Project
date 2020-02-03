<?php 
	session_start();
	if (isset($_SESSION['uid'])) {
		header('location:admin/admindash.php');
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<style type="text/css">
		.login-h2{
		margin: 5px 0 15px 0px;
		font-size: 30px;
		color: #f00;
		text-align: center;
	}
	form{
		width:270px;
		height:255px;
		border:1px solid #333;
		padding:10px;
		float: right;
		margin:10px;
		border-radius:5%;
	}
	form label{
		font-weight: bold;
		padding:0 10px 0 0;
		font-size: 20px;
		color: #86220c;
	}
	form input[type="text"],input[type="password"]{
		height: 20px;
		margin: 0 0 10px 0px;
		padding: 4px 0 3px 4px;
		width: 95%;
		height: 26px;
		outline: none;
		border: none;
		border-bottom:1px solid #0080ff;
	}
	form input[type="password"]{
		margin: 0 0 0 3px;
	}
	input[type="submit"]{
		padding: 3px 5px 3px 5px;
		margin: 10px 0 5px 0;
		border-radius: 10%;
	}
	input[type="submit"]:hover{
		cursor: pointer;
		outline: none;
	}
	</style>
</head>
<body>
	<div class="heading">
		<h1>Welcome to the School Management System</h1>
	</div>
	<form method="post" action="login.php">
		<h2 class="login-h2">Login Form</h2>
		<div class="Username">
			<label>Username:</label>
			<input type="text" name="name" placeholder="Enter your name" required="required">
		</div>
		
		<div class="password">
			<label>Password:</label>
			<input type="password" name="pass" placeholder="Enter your password" required="required">
		</div>
		
		<input type="submit" name="submit" value="Login"><br>
		<a class="form-link" href="">Forget password</a><br>
	</form>
</body>
</html>

<?php 
	include('dbcon.php');
	if (isset($_POST['submit'])) {
			
		$name = $_POST['name'];
		$password = $_POST['pass'];

		$query = "SELECT * FROM `admin` WHERE `username` = '$name' AND `password` = '$password'";

		$run = mysqli_query($con,$query);

		$row = mysqli_num_rows($run);

		if ($row<1) {
			?>
			<script>
				alert("Username or Password does not match");
				window.open('login.php','_SELF');
			</script>
			<?php
		}
		else
		{
			$data = mysqli_fetch_assoc($run);

			$id = $data['id'];
			
			

			$_SESSION['uid'] = $id;

			header('location:admin/admindash.php');
		}


	}

 ?>


 