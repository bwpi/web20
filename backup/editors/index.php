  <?php
//$server=$_SERVER["HTTP_HOST"];
$content='users.txt';
$name=$_POST['name'];
$f_name=$_POST['f_name'];
$user=$_POST['login'];
$pass=md5($_POST['password']);
$ip=$_SERVER['REMOTE_ADDR']; //IP Адрес
$next_str = file_get_contents($content);
$next_str.= "$name | $f_name | $user | $pass | $ip\n";
file_put_contents($content, $next_str);
//Вывод списка пользователей
foreach(file($content,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)as $str1) {
echo $str1."<br />";}
header('Location: http://gsoshcu/info/index.php');
exit;
?>
            

