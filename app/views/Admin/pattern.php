<div class="row">
	<div class="col-xl-9">
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
	<input class="form-controll" id="name" type="text">
	<button class="btn btn-info" id="save" type="submit">Сохранить как JSON</button>
	</div>
	<div class="col-xl-3">
		<div class="h4">Список загруженных файлов</div>
		<form method="post">
			<div class="list-group">	
				<?php foreach ($files_uploaded as $key => $value):?>
					<button type="submit" name="<?=$value?>" class="list-group-item list-group-item-action <?=$active?>"><?=$value?></button>
				<?php endforeach;?>
			</div>
		</form>
		<div class="h4">Список файлов КТП</div>		
		<div class="list-group">
			<?php if (isset($ktp_files)):?>
				<?php foreach ($ktp_files as $key => $value):?>				
					<button type="button" class="list-group-item btn btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				        <?=$value?>
				    </button>
				    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				    	<?php if ($value != 'ktp.json') :?>
					      	<a class="dropdown-item" href="<?=HTTP_HOST?>admin/pattern?id=<?=$value?>&&method=delete">удалить</a>					    
				      	<?php endif;?>
				        <a class="dropdown-item" href="<?=HTTP_HOST?>admin/ktp?id=<?php echo str_replace('.json', '', $value);?>">редактировать</a>					  
				    </div>
				<?php endforeach;?>
			<?php endif;?>
		</div>		
	</div>
</div>