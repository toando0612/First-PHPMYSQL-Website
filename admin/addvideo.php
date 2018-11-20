<?php
// var_dump($_FILES);
require("../lib/connect.php");

	if(isset($_POST['add']) && !empty($_POST['title']) && !empty($_POST['singer']) && !empty($_FILES['image']) && !empty($_POST['video_link'])){
		$title = trim($_POST['title']);
		$singer = trim($_POST['singer']);
		$image = $_FILES['image']['name'];
		$video_link = explode("=", $_POST['video_link'])[1];
		$id_cat_video = $_POST['id_cat_video'];

		$sql = "SELECT * FROM `video` WHERE `video_link` LIKE '$video_link'";
		$result = mysqli_query($con,$sql);
		$num_rows = mysqli_num_rows($result);
		
		if($num_rows==0){
		
			$sql = "INSERT INTO `video` (`id`, `title`, `image`, `singer`, `video_link`, `id_cat_video`) VALUES (NULL, '$title', '$image', '$singer', '$video_link', '$id_cat_video');";
			
			$con->query($sql);
		}
		header("location:?page=listvideo");
		
		

	}

?>

<form method="post" enctype="multipart/form-data">
	<table border="1px" width="800px">
		<thead>
			<tr>
		<!-- `title`, `image`, `video_link`, `view`, `singer`, `id_cat_video` -->
				<th>TITLE</th>
				<th>SINGER</th>
				<th>IMAGE</th>
				<th>VIDEO</th>
				<th>CATEGORY</th>

			
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="text" name="title"></td>
				<td><input type="text" name="singer"></td>
				<td><input type="file" name="image" accept="image/*"></td>
				<td><input type="text" name="video_link"></td>
				<td>
					<select name="id_cat_video">
						<?php 
							$sql = "SELECT * FROM `cat_video`";
							$result = mysqli_query($con,$sql);
							if(mysqli_num_rows($result)){
								while ( $row = mysqli_fetch_assoc($result) ) {
						?>
						<option value="<?php echo $row['id']?>"> <?php echo mb_strtoupper($row['name'])?> </option>
						<?php } } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><input type="submit" name="add"></td>
				
			</tr>
		</tbody>
	</table>

	
</form>