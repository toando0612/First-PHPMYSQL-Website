<?php
	if(isset($_GET['xoa']))

?>
<div class="col-9">
	<table border="1px" align="center" id="myTable">
		<thead>
			<tr>
		
				<th>TITLE</th>
				<th>SINGER</th>
				<th>IMAGE</th>
				<th>VIDEO LINK</th>
				<th>VIEW</th>
				<th>CATEGORY</th>
				<th>DELETE</th>
				<th>EDIT</th>
			
			</tr>
		</thead>
		<tbody>
		<?php 
		require("../lib/connect.php");
			$sql = "SELECT * FROM video";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                	$id = $row['id_cat_video'];
                	$sql2 = "SELECT * FROM `cat_video` WHERE `id` = $id";
                	
                	$result2 = mysqli_query($con, $sql2);
                	$category = mysqli_fetch_assoc($result2);
                	
		?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['singer'];?></td>
				<td><img src="../upload/images/<?php echo $row['image'];?>"></td>
				<td><a href="https://www.youtube.com/watch?v=<?php echo $row['video_link'];?>"><?php echo $row['video_link'];?></a></td>				
				<td><?php echo $row['view'];?></td>
				<td><?php echo $category['name'];?></td>
				<td><a href="?page=deletevideo&id=<?php echo $row['id'];?>">Delete</a></td>
				<td><a href="?page=editvideo&id=<?php echo $row['id'];?>">Edit</a></td>
			</tr>
		<?php }} ?>	
		</tbody>
	</table>
</div>