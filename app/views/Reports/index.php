<div class="container-fluid text-center">	
	<div class="row">
		<div class="col-2 m-2 d-print-none bg-white">			
			<?php foreach ($reports as $key => $value):?>
			<a class="btn btn-info" href="?id=<?= $value?>">Отчет <?= $value?></a>
			<?php endforeach;?>
			<hr>
			<?php foreach ($reports_list as $key => $value):?>
				<a class="btn btn-info" href="/reports?report=<?= $value?>">Отчет <?= $value?></a>
			<?php endforeach;?>
		</div>	
		<div class="col-8 m-2">
			<?= $report?>
		</div>
	</div>
</div>