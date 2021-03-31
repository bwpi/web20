<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="d-inline-block">
    <title></title> 

    <!-- Bootstrap CSS, Jquery UI, FontAwesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">   

  </head>
  <body>
  	<div class="container mt-3">

<?php

	//Прием переменных из формы отчета за четверть
	$report = array(		
		0 => array("Количество обучающихся",(int)$_POST['number']), //Количество обучающихся
		1 => array("На 5",(int)$_POST['number5']), //На 5
		2 => array("На 4",(int)$_POST['number4']), //На 4
		3 => array("На 3",(int)$_POST['number3']), //На 3
		4 => array("Не успевают",(int)$_POST['number2']), //Не успевают
		5 => array("Не аттестовано",(int)$_POST['number0']), //Не аттестовано
		6 => array("Процент качества",round((($_POST['number5'] + $_POST['number4'])/$_POST['number'])*100, 2)), //Процент качества
		7 => array("Процент успеваимости",round((($_POST['number5'] + $_POST['number4'] + $_POST['number3'])/$_POST['number'])*100, 2)), //Процент успеваимости
		8 => array("СОУ",round((($_POST['number5'] + $_POST['number4']*0.67 + $_POST['number3']*0.35 + $_POST['number2']*0.11 + $_POST['number0']*0.11)/$_POST['number'])*100, 2)), //СОУ
		9 => array("Выполнение программы",(int)$_POST['percent']), //Выполнение программы
		10 => array("Кто не успевает и в каком классе, коментарий к отчету!",htmlspecialchars($_POST['comment'])), //Кто не успевает и в каком классе, коментарий к отчету!
		);
				$summ = $_POST['number5'] + $_POST['number4'] + $_POST['number3'] + $_POST['number2'] + $_POST['number0'];
			  $i = 1;
			  if ($_POST['number'] != $summ) {
				$message = array('Обнаружены ошибки!', 'не успешно', 'Cумма значений 2-7 должна быть равна 1','alert-danger','Печать не возможна','disabled');
			  }
			  else {
				$message = array('Отличная работа!', 'успешно', 'Верная сумма значений','alert-success','Распечатать');
			}
	
	
?>

  		<div class="alert <?php echo($message[3]);?> d-print-none" role="alert">
		  <h4 class="alert-heading"><?php echo($message[0]);?></h4>
		  <p>Проверка пройдена <?php echo($message[1]);?>.</p>
		  <hr>
		  <p class="mb-0"><?php echo($message[2]);?></p><a class="btn btn-info <?php echo($message[5]);?>" href="javascript:(print());"><?php echo($message[4]);?></a>
		</div>

	  	<div class="h3 mt-2">Отчет успеваимости</div>
	  	<div class="input">По предмету: <?php echo(htmlspecialchars($_POST['subject']));?> за <?php echo (int)date('Y');?> - <?php echo (int)date('Y') + 1;?> учебный год.</div>
	  	<div class="input">Учитель: <strong><?php echo(htmlspecialchars($_POST['fio']));?></strong></div>  	
	  	<div class="input">Четверть: <?php echo(htmlspecialchars($_POST['quarter']));?></div>  	
	  	
		<?php
			
			  
				echo '<table class="table table-bordered">
				  <thead>
				    <tr>
				      <th scope="col">№</th>
				      <th scope="col">Показатель</th>
				      <th scope="col">1 четверть</th>
				      <th scope="col">2 четверть</th>
				      <th scope="col">3 четверть</th>
				      <th scope="col">4 четверть</th>
				      <th scope="col">Год</th>
				    </tr>
				  </thead>
				  <tbody>';
					foreach ($report as $level1) {
				  	    	echo '<tr><th scope="row">'.$i++.'</th>';
				  	    	echo '<td class="alert '.$message[3].'">'.$level1[0].'</td><td>'.$level1[1].'</td><td>'.$level1[2].'</td><td>'.$level1[3].'</td><td>'.$level1[4].'</td><td>'.$level1[5].'</td></tr>';				  	    	
				  	    };	
				echo '</tbody></table>';		
			  
			  
		?>

  	</div>
  	
  	
    
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
</html>