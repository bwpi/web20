<?php 
// Ïåðåìåííîé $d ïðèñâàèâàþ çíà÷åíèå. ïåðåäàííûå èç ôîðìû 
$d=$_POST['b']; 
// Äëÿ ïðîâåðî÷êè âûâîæó çíà÷åíèå ïåðåìåííîé $d 
//echo $dat;
// Îòêðûâàþ ôàéë 1.txt 
$fil="admin.txt"; 
$fp=fopen($fil,'w'); 
// Çàïèñûâàþ â ôàéë 1.txt ïåðåìåííóþ $d 
fwrite($fp,$d);
echo "<script>alert('Запись завершена');</script>";
fclose($fp);
header('Location: /info/thems/dashboard.php');
?>



