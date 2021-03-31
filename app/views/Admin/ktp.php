<div class="h3" id="title">Календарно-тематический план 5 класс</div>
<table class="table table-responsive table-hover table-bordered table-dark shadow-lg" id="ktp">
 <tbody>
  <tr>
  	<th scope="col">#</th>
  	<?php foreach ($key_table_col as $key => $value):?>
		<th scope="col"><?= str_replace('_', ' ', my_ucfirst($value, 'utf-8'));?></th>
	<?php endforeach;?>
  </tr>
 
 	<?php foreach ($theme_plane as $key => $value):?>
 		<tr><th scope="row"><?= $key;?></th>
 			<?php foreach ($value as $key1 => $col):?>
 				<td contenteditable="true" data-ktp="<?php echo "$key/$key1";?>"><?=$col;?></td>
 			<?php endforeach;?>
 		</tr>
 	<?php endforeach;?> 	
</tbody>
</table>
<a class="btn btn-info" id="add_row">Добавить строку</a>