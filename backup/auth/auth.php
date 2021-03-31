<?php 
session_start();
$login = 'bwpi';          // Логин 
$password = 'Plazma91';      // Пароль
//-----------------// 
if (($_COOKIE['login'] == $login) && ($_COOKIE['password'] == $password) || ($_SESSION['password'] == md5($login.':'.$password))) 
 { 
  /*Вы уже авторизированны*/
  //$auth=$admin;
  header('Location: /thems/dashboard.php');
 } 
 else 
 { 
  if(($_POST['login']) && ($_POST['password'])) 
   { 
  if((trim($_POST['login']) == $login) && (trim($_POST['password']) == $password)) 
   { 
    if(!$_POST['save_cookie']) 
     { 
      $_SESSION['password'] = md5($login.':'.$password); 
      /*'Вы авторизированны! (сессия)*/
      //$auth=$admin;
      header('Location: /thems/dashboard.php');
     } 
     else 
     { 
      setcookie("login",$login); 
      setcookie("login",$password);
      //$auth=$admin;
      header('Location: /thems/dashboard.php');
     } 
   } 
   else 
   { 
    echo '<script>alert("Логин или пароль не верны!")</script>';
   } 
  }  
  else 
  { 
   if((!$_POST['login']) && (!$_POST['password']))  
   {
     
   } 
   else 
   { 
   echo '<script>alert("Введите все значения!")</script>';
   }
  }
  }
?>
