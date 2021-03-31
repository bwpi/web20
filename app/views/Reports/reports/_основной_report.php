<?php
extract($post_in);
?>
<div class="container mt-3">
	<div class="alert alert-<?= $message[3]?> d-print-none" role="alert">
	  <h4 class="alert-heading"><?= $message[0]?></h4>
	  <p>Проверка пройдена <?= $message[1]?>.</p>
	  <hr>
	  <p class="mb-0"><?= $message[2]?></p><a class="btn btn-info <?= $message[5]?>" href="javascript:(print());"><?= $message[4]?></a>
	</div>
  	<div class="h3 mt-2">Отчет успеваимости</div>
  	<div class="input">По предмету: <?= $subject?> за <?= (int)date('Y')-1?> - <?= (int)date('Y')?> учебный год.</div>
  	<div class="input">Учитель: <strong><?= $teacher?></strong></div>  	
  	<div class="input">Сформированный отчет за: <?= ($_POST['quarter'] == 'year') ? 'Год' : $_POST['quarter'] . '-ю четверть';?></div>

	<table class="table table-bordered bg-light text-dark">
		<thead>
		    <tr>		      
		      <th scope="col">Показатель</th>
		      <th scope="col">1 четверть</th>
		      <th scope="col">2 четверть</th>
		      <th scope="col">3 четверть</th>
		      <th scope="col">4 четверть</th>
		      <th scope="col">Год</th>
		    </tr>
		</thead>
		<tbody>			
			<?php foreach ($report_items as $level1):?>
				<?php $i++;?>
				<tr>	  	    		
		  	    	<th scope="row" class="alert <?=$message[3]?>"><?=$level1[0]?></th>		  	    	
		  	    	<td class="<?= ($_POST['quarter'] == '1') ? 'bg-success' : '';?>"><?php debug($rep[1][$i][1]);?></td>
		  	    	<td class="<?= ($_POST['quarter'] == '2') ? 'bg-success' : '';?>"><?php debug($rep[2][$i][1]);?></td>
		  	    	<td class="<?= ($_POST['quarter'] == '3') ? 'bg-success' : '';?>"><?php debug($rep[3][$i][1]);?></td>
		  	    	<td class="<?= ($_POST['quarter'] == '4') ? 'bg-success' : '';?>"><?php debug($rep[4][$i][1]);?></td>
		  	    	<td class="<?= ($_POST['quarter'] == 'year') ? 'bg-success' : '';?>"><?php debug($rep['year'][$i][1]);?></td>
		  	    </tr>
	  	    <?php endforeach;?>
		</tbody>		
	</table>	
</div>
