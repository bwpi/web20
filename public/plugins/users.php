<?php
    # Путь к файлу
    $file_name = "users.txt";    
    # Считываем информацию по строкам
    $data = file( $file_name );
    $counter = 0;
?>
<div class="table-responsive">
<table class="table table-hover table-sm">
	<caption>Список пользователей</caption>
	<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Username</th>
      <th scope="col" class="pass_word">Password</th>
      <th scope="col">IP</th>
    </tr>
  </thead>
<?php
    # В цикле обходим массив данных
    foreach( $data as $value ):
    
        # Разбиваем строку по |
        $value = explode( " | ", $value );
?>
    <tbody>
    <tr>
    	<th scope="row"><?php $counter++; print $counter;?></th>
        <td contenteditable="true"><?=$value[0]?></td>
        <td contenteditable="true"><?=$value[1]?></td>
        <td contenteditable="true"><?=$value[2]?></td>
        <td contenteditable="true" class="pass_word"><?=$value[3]?></td>
        <td contenteditable="true"><?=$value[4]?></td>
    </tr>
<?php
    endforeach;
?>
<?php $login=$_GET['login'];
      echo $value[2].'<br/>';
      echo $value[3];
?>
</tbody>
</table>
</div>




