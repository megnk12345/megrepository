<?php  

if (count($error)>0): ?>
<div class = 'alert alert-danger' style='width: 50%; margin-top: 5px; '>
	<?php foreach ($error as $errors):?>
		<label><p><?php  echo $errors."<br>"; ?></p></label>

<?php endforeach ?>
</div>
  <?php endif ?>