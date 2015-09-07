<div class="form">
	<label>Registration</label>
	<form action="/user/registration" method="post">
		<label>Insert name:</label>
		<input type="text" name="name"><br>
		
		<label>Insert email:</label>
		<input type="text" name="email"><br>
		
		<label>Insert password:</label>
		<input type="text" name="password"><br>
		
		<input type="submit" name="register_user" value="Run">
	</form>
	<div>
		<?php
			//echo $data;
		?>
	</div>
</div>
<script>

</script>