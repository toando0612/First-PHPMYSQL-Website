<?php
	if(isset($_GET['xoa']))

?>

<div class="col-9">
	<table border="1px" align="center" id="myTable">
		<thead>
			<tr>
		
				<th>FULLNAME</th>
				<th>EMAIL</th>
				<th>GENDER</th>
				<th>LEVEL</th>
				
				<th>DELETE</th>
				<th>EDIT</th>
			
			</tr>
		</thead>
		<tbody>
		<?php 
		require("../lib/connect.php");
			$sql = "SELECT * FROM user";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
		?>
			<tr>
				<td><?php echo mb_strtoupper($row['fullname']);?></td>
				<td><?php echo mb_strtoupper($row['email']);?></td>
				<td><?php echo mb_strtoupper($row['gender']);?></td>
				
				<td><?php echo ($row['level']==1)?"Admin":"Member";?></td>
				<td><a href="?page=deleteuser&id=<?php echo $row['id'];?>">Delete</a></td>
				<td><a href="?page=edituser&id=<?php echo $row['id'];?>">Edit</a></td>
			</tr>
		<?php }} ?>	
		</tbody>
	</table>
</div>