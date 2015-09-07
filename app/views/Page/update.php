<div class="form">
	<label>Update page:</label>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<label>Insert new title:</label>
		<input type="text" name="title" value="<?php echo $data["title"]; ?>"><br>
		<label>Insert new text:</label>
		<textarea rows="10" cols="45" name="text"><?php echo $data["text"]; ?></textarea>
		<input type="submit" name="update_page" value="Put">
	</form>
</div>