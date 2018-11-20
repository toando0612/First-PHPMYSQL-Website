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
				<th>SONG LINK</th>
				<th>VIEW</th>
				<th>DELETE</th>
				<th>EDIT</th>
			
			</tr>
		</thead>
		<tbody>
		<?php 
		require("../lib/connect.php");
			$sql = "SELECT * FROM song";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo $row['title'];?></td>
				<td><?php echo $row['singer'];?></td>
				<td><img src="../upload/images/<?php echo $row['image'];?>"></td>
				<td><a href="../upload/music/<?php echo $row['song_link'];?>"><?php echo $row['song_link'];?></a></td>
				<td><?php echo $row['view'];?></td>
				<td><a href="?page=deletesong&id=<?php echo $row['id'];?>">Delete</a></td>
				<td><a href="?page=editsong&id=<?php echo $row['id'];?>">Edit</a></td>
			</tr>
		<?php }} ?>	
		</tbody>
	</table>
</div>