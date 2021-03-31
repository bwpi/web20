<?php 
// Переменной $d присваиваю значение. переданные из формы 
$d=$_POST['a']; 
// Для проверочки вывожу значение переменной $d 
echo $d; 
// Открываю файл 1.txt 
$fil="users.txt"; 
$fp=fopen($fil,'w'); 
// Записываю в файл 1.txt переменную $d 
fwrite($fp,$d); 
fclose($fp); 
header('Location: /info/thems/dashboard.php');
?>



