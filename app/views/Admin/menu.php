<div class="h3" id="title">Календарно-тематический план 5 класс</div>
<table class="table table-responsive table-hover table-bordered table-dark shadow-lg" id="ktp">
 <tbody>
  <tr>
  	<th scope="col">#</th>  	
	<th scope="col">Пункт меню</th>	
  </tr>
 
 	<?php foreach ($item as $key => $col):?>
 		<tr>
 			<th scope="row"><?= $key;?></th>
 			<td contenteditable="true" data-ktp="<?=$key;?>"><?=$col;?></td>
 		</tr>
 	<?php endforeach;?>
</tbody>
</table>
<a class="btn btn-info" id="add_row">Добавить строку</a>