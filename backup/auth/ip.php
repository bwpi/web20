<?php    
if (in_array($ip, $search_a)) {
//Если равны, то доступ админа
  $title = $title_a;
  $main = $main_a;
  $set = $set_a;
  include ("thems/admin.php");
}
elseif (in_array($ip, $search_t)){
//Если равны, то доступ поддержки
  $title = $title_t;
  $main = $main_t;
  $set = $set_t;
  include ("thems/support.php");
}
else {
//Доступ для учеников
  $title = $title_u;
  $main = $main_u;
  $set = $set_u;
  include ("thems/user.php");
}
//Авторизация по ip
?>
