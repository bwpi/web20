<?php
include ("../config.php");
if (isset($_POST['one']))
{
	$d=$_POST['one'];	
	$fil="../blocks/html/left_bar.html"; 
	$fp=fopen($fil,'w');
	fwrite($fp,$d);
	fclose($fp);	
    echo 'Меню изменено';
}
?>