<?php
// var_dump($_FILES);
	require("../lib/connect.php");
	if(isset($_GET['page']) && $_GET['page'] =="editvideo" && isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `video` WHERE `id` = $id";
		$result = mysqli_query($con,$sql);

		$video = mysqli_fetch_assoc($result);
		$current_img = $video['image'];
		
		$current_video_link = $video['video_link'];
		// && !empty($_FILES['image']) && !empty($_FILES['songlink'])
	}
	if( isset($_POST['update']) && !empty($_POST['title']) && !empty($_POST['singer']) ){
		
		$title = $_POST['title'];
		$singer = $_POST['singer'];
		$id_cat_video = $_POST['id_cat_video'];
		
		$image = ( !empty($_FILES['image']['name']) ) ? $_FILES['image']['name'] : $current_img;

		$video_link = ( !empty($_POST['video_link']) ) ? $_POST['video_link'] : $current_video_link;

		$sql = "UPDATE `video` SET `title` = '$title', `image` = '$image', `singer` = '$singer', `video_link` = '$video_link', `id_cat_video` = '$id_cat_video' WHERE `video`.`id` = $id;";
		
		if ($con->query($sql) === TRUE) {
		    header("location:?page=listvideo");
		} else {
		    echo "Error updating record: " . $con->error;
		}
		
		// die();

	}

?>
<div class="col-9">
<form method="post" enctype="multipart/form-data">
	<table border="1px" >
		<thead>
			<tr>
		<!-- `id`, `title`, `image`, `video_link`, `view`, `singer`, `id_cat_video` -->
				<th>TITLE</th>
				<th>SINGER</th>
				<th>IMAGE</th>
				<th>VIDEO</th>
				<th>CATEGORY</th>
			
			</tr>
		</thead>
		<tbody>
			<?php if(isset($video)){?>
			<tr>
				<td><input type="text" name="title" value="<?php echo $video['title']?>"></td>
				<td><input type="text" name="singer" value="<?php echo $video['singer']?>"></td>
				<td><input type="file" name="image" accept="image/*"></td>
				<td><input type="text" name="video_link" value="<?php echo $video['video_link']?>"></td>
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
			<?php } ?>
			<tr>
				<td colspan="4"><input type="submit" name="update" value="UPDATE"></td>
				
			</tr>
		</tbody>
	</table>

	
</form>
</div>