<?php
$ip = $_SERVER['REMOTE_ADDR']; //IP Адрес
$data = file_get_contents("config/admin_ip.conf");
$search = explode("\r\n", $data);
echo "$ip".'<br/>';
if (in_array($ip, $search)) {
    echo "$ip";
}

else {
    echo "нету";
}

?>
