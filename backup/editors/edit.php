<?php 
// ���������� $d ���������� ��������. ���������� �� ����� 
$d=$_POST['a']; 
// ��� ���������� ������ �������� ���������� $d 
echo $d; 
// �������� ���� 1.txt 
$fil="users.txt"; 
$fp=fopen($fil,'w'); 
// ��������� � ���� 1.txt ���������� $d 
fwrite($fp,$d); 
fclose($fp); 
header('Location: /info/thems/dashboard.php');
?>



