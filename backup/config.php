<?php
	session_start();

	$server = $_SERVER['HTTP_HOST']; //Имя сервера
	$ip = $_SERVER['REMOTE_ADDR']; //IP Адрес
	$host = ("http://".$server); //Адрес хоста
	$files = ($host.'/files/'); //Файлы
	$plugins = ($host.'/plugins/'); //Плагины
	$config = ($host.'/plugins/config/'); //Файлы конфигурации
	$blocks = ($host.'/blocks/'); //Файлы
	$logo = $files.'img/iconic.png'; //Иконка
	$img = $files.'img/'; //Изображения

	//Файлы
	$data_a = file_get_contents('editors/admin.txt');
	$search_a = explode("\r\n", $data_a);
	$data_t = file_get_contents('editors/teach.txt');
	$search_t = explode("\r\n", $data_t);

	//Константы
	$title_a = 'Администратор';
	$title_t = 'Учителя';
	$title_u = 'Ученик';
	$main_a = 'Административная панель МКОУ ГСОШ';
	$main_t = 'Страница быстрого доступа МКОУ ГСОШ';
	$main_u = 'Информационная страница МКОУ ГСОШ';
	$set_a = '$(".user").remove();$.removeCookie("admin");$(".dash").hide();$("form.search").show(1000);$(".login").show(1000);';
	$set_t = '$(".sup, .user, .dashboard").remove();';
	$set_u = '$(".adms, .sup").remove();';
	$auth = '<a class="btn btn-transparent login" data-toggle="modal" data-target="#auth"><i class="fas fa-user"></i></a>';

	//Выход из сессии
	if(isset($_GET['exit']))
		{
			session_destroy();
			header("Location: $host");
			exit;    
		};
	
	//Вход в админку из любой точки
	if (isset($_GET['admin_login']))
		{
			session_destroy();
			header("Location: $host/auth/login.php");
			exit;
		};
?>
