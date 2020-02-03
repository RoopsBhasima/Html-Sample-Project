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
 </head>
 <body>
 	<div class="heading">
		<h1>Welcome to the School Management System</h1>
	</div>
	<div class="box box-1">
		<a href="../changepass/changepassword.php?sid=<?php echo $_SESSION['uid'];?>" class="left-box">Change Password</a>
	</div>
	<div class="box">
		<a href="../logout.php" class="left-box">logout</a>
	</div>
	
 	

 	<table>
 		<tr>
 			<td>1.</td>
 			<td><a href="addstudent.php">Add Students</a></td>
 		</tr>
 		<tr>
 			<td>2.</td>
 			<td><a href="updatastudent.php">Updata Students</a></td>
 		</tr>
 		<tr>
 			<td>3.</td>
 			<td><a href="deletestudent.php">Delete Students</a></td>
 		</tr>
 	</table>
 </body>
 </html>