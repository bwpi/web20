<table width="600">
	<form method="post" enctype="multipart/form-data">
		<tr>
			<td width="20%">Select file</td>
			<td width="80%"><input type="file" name="file" id="file" /></td>
		</tr>
		<tr>
			<td>Submit</td>
			<td><input type="submit" name="submit" /></td>
		</tr>
	</form>
</table>
<div class="h4">Список загруженных файлов</div>
<form method="post">
	<div class="list-group">	
		<?php foreach ($files_uploaded as $key => $value):?>
			<button type="submit" name="<?=$value?>" class="list-group-item list-group-item-action <?=$active?>"><?=$value?></button>
		<?php endforeach;?>
	</div>
</form>
<div class="h3" id="title">Календарно-тематический план 5 класс</div>
<table class="table table-responsive table-hover table-bordered table-dark shadow-lg" id="ktp">
 <tbody>
  <tr>
  	<th scope="col">#</th>
  	<?php foreach ($key_table_col as $key => $value):?>
		<th scope="col"><?= str_replace('_', ' ', my_ucfirst($value, 'utf-8'));?></th>
	<?php endforeach;?>
  </tr>
 	<?php if (!empty($data)):?> 		
	 	<?php foreach ($data as $key => $value):?>
	 		<tr><th scope="row"><?= $key;?></th>
	 			<?php foreach ($value as $key1 => $col):?>
	 				<td contenteditable="true" data-ktp="<?php echo "$key/$key1";?>"><?=$col;?></td>
	 			<?php endforeach;?>
	 		</tr>
	 	<?php endforeach;?>
 	<?php endif;?>
</tbody>
</table>