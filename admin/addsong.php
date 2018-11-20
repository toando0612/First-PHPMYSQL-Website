<?php
// var_dump($_FILES);
require("../lib/connect.php");

	if(isset($_POST['add']) && !empty($_POST['title']) && !empty($_POST['singer']) && !empty($_FILES['image']) && !empty($_FILES['songlink'])){
		$title = trim($_POST['title']);
		$singer = trim($_POST['singer']);
		$image = $_FILES['image']['name'];
		$songlink = $_FILES['songlink']['name'];
		$sql = "SELECT * FROM `song` WHERE `song_link` LIKE '$songlink'";
		$result = mysqli_query($con,$sql);
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows==0){
		
			$sql = "INSERT INTO `song` (`id`, `title`, `image`, `singer`, `song_link`) VALUES (NULL, '$title', '$image', '$singer', '$songlink');";
			
			$con->query($sql);
		}
		header("location:?page=listsong");
		
		die();

	}

?>

<form method="post" enctype="multipart/form-data">
	<table border="1px" width="800px">
		<thead>
			<tr>
		
				<th>TITLE</th>
				<th>SINGER</th>
				<th>IMAGE</th>
				<th>SONG LINK</th>

			
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="title"></td>
				<td><input type="text" name="singer"></td>
				<td><input type="file" name="image" accept="image/*"></td>
				<td><input type="file" name="image" accept="image/*"></td>
				<td><input type="file" name="songlink" accept="audio/*"></td>
			</tr>
			<tr>
				<td colspan="4"><input type="submit" name="add"></td>
				
			</tr>
		</tbody>
	</table>

	
</form>