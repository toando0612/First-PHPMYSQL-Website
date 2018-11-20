<?php
// var_dump($_FILES);
	require("../lib/connect.php");
	if(isset($_GET['page']) && $_GET['page'] =="edituser" && isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT * FROM `user` WHERE `id` = $id";
		$result = mysqli_query($con,$sql);

		$user = mysqli_fetch_assoc($result);
		
		
		$current_password = $user['password'];
		// && !empty($_FILES['image']) && !empty($_FILES['songlink'])
	}
	if( isset($_POST['update']) && !empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['level'])){
		
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$level = $_POST['level'];
		
		
		$password = ( !empty($_POST['password']) ) ? md5($_POST['password']) : $current_password;

		$sql = "UPDATE `user` SET `fullname` = '$fullname', `email` = '$email', `gender` = '$gender', `level` = '$level', `password` = '$password' WHERE `user`.`id` = $id;";
		
		if ($con->query($sql) === TRUE) {
		    header("location:?page=listuser");
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
		
				<th>FULLNAME</th>
				<th>EMAIL</th>
				<th>PASSWORD</th>
				<th>GENDER</th>
				<th>LEVEL</th>
			
			</tr>
		</thead>
		<tbody>
			<?php if(isset($user)){?>
			<tr>
				<td><input type="text" name="fullname" value="<?php echo $user['fullname']?>"></td>
				<td><input type="text" name="email" value="<?php echo $user['email']?>"></td>
				<td><input type="text" name="password" value=""></td>
				<td><input type="text" name="gender" value="<?php echo $user['gender']?>"></td>
				
				<td>
					<select name="level">
						<option value="1" <?php echo $user['level']==1? "selected":"" ?> >ADMIN </option>
						<option value="2" <?php echo $user['level']==2? "selected":"" ?>>MEMBER</option>
						
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