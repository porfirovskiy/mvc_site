<div class="form">
	<label>Update user</label>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<label>Insert new name:</label>
		<input type="text" name="name" value="<?php echo $data["name"]; ?>"><br>
		
		<label>Insert new email:</label>
		<input type="text" name="email" value="<?php echo $data["email"]; ?>"><br>
		
		<label>Insert new password:</label>
		<input type="text" name="password"  value="<?php echo $data["password"]; ?>"><br>
		
		<input type="submit" name="update_user" value="Run">
	</form>
	<div>
		<?php
			//echo $data;
		?>
	</div>
</div>
<script>

</script>