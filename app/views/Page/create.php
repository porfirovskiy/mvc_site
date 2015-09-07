<div class="form">
	<label>Create page</label>
	<form action="/page/create" method="post">
		<label>Insert title:</label>
		<input type="text" name="title"><br>
		<label>Insert text:</label>
		<textarea rows="10" cols="45" name="text"></textarea>
		<input type="submit" name="save_page" value="Run">
	</form>
	<div>
		<?php
			//echo $data;
		?>
	</div>
</div>
<script>

</script>