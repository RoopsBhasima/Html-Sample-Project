<?php 
		include('../dbcon.php');
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$add = $_POST['add'];
		$stand = $_POST['standard'];
		$id = $_POST['sid'];

		$imagename = $_FILES['image1']['name'];
		$tempimage = $_FILES['image1']['tmp_name'];

		move_uploaded_file($tempimage,"../dataimage/$imagename");

		$query = "UPDATE `student` SET`name`='$name',`roll no`='$roll',`Address`='$add',`Standard`='$stand',`image`='$imagename' WHERE `id` = '$id'";

		$run = mysqli_query($con,$query);

		if ($run == TRUE) {
			?>
			<script>
				alert("Data UPDATE successfully");
				window.open('updataform.php?sid=<?php echo $id; ?>','_self');
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