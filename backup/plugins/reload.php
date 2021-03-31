<?php
include ("../config.php");
if (isset($_POST['one'])&&isset($_POST['file']))
{
	$d=$_POST['one'];
	$file=$_POST['file'];	
	$fil='../blocks/'.$file.'.html'; 
	$fp=fopen($fil,'w');
	fwrite($fp,$d);
	fclose($fp);	
    echo $fil;
}
?>