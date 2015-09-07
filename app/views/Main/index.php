<?php foreach ($data as $post): ?>
	<div>
		<?php echo $post['title']; ?><br>
		<?php echo $post['text']; ?><br>
		<?php echo $post['date']; ?><br>
	</div>
<?php endforeach; ?>