<?php
// var_dump($_FILES);
	require("../lib/connect.php");
	if(isset($_GET['page']) && $_GET['page'] =="editsong" && isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `song` WHERE `id` = $id";
		$result = mysqli_query($con,$sql);

		$song = mysqli_fetch_assoc($result);
		$current_img = $song['image'];
		
		$current_songlink = $song['song_link'];
		// && !empty($_FILES['image']) && !empty($_FILES['songlink'])
	}
	if( isset($_POST['update']) && !empty($_POST['title']) && !empty($_POST['singer']) ){
		
		$title = $_POST['title'];
		$singer = $_POST['singer'];
		
		
		$image = ( !empty($_FILES['image']['name']) ) ? $_FILES['image']['name'] : $current_img;

		$songlink = ( !empty($_FILES['songlink']['name']) ) ? $_FILES['songlink']['name'] : $current_songlink;

		$sql = "UPDATE `song` SET `title` = '$title', `image` = '$image', `singer` = '$singer', `song_link` = '$songlink' WHERE `song`.`id` = $id;";
		
		if ($con->query($sql) === TRUE) {
		    header("location:?page=listsong");
		} else {
		    echo "Error updating record: " . $con->error;
		}
		
		// die();

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
			<?php if(isset($song)){?>
			<tr>
				<td><input type="text" name="title" value="<?php echo $song['title']?>"></td>
				<td><input type="text" name="singer" value="<?php echo $song['singer']?>"></td>
				<td><input type="file" name="image" accept="image/*"></td>
				<td><input type="file" name="songlink" accept="audio/*"></td>
			</tr>
			<?php } ?>
			<tr>
				<td colspan="4"><input type="submit" name="update" value="UPDATE"></td>
				
			</tr>
		</tbody>
	</table>

	
</form>