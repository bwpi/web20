<?php 
include ("../config.php");
//Проверка авторизации
if ((!$_COOKIE['login'] == $login) && (!$_COOKIE['password'] == $password) || (!$_SESSION['password'] == md5(!$login.':'.$password))) 
 { 
  /*Вы уже авторизированны*/
  //$auth=$admin;
  header('Location: /');
 };
//////////
$set = '$(".user").hide();$(".nav_dash").css("z-index","900");$("#sidebarCollapse").offset({top:100});$(".user_name, .login").hide();$(".dash").show(1000);$(".logout").click(function(){$.removeCookie("admin");});$.cookie("admin", 1);$(".dash").show(1000);$("form.search").hide(1000);$(".login").hide(1000);';
$title = "Панель управления";
$user_name = '<div class="mr-2">bwpi</div>';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/header.html";?>
<body class="text-center">
	<div class="nav_dash">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/nav_adm.html";?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/side_bar.html";?>	
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/nav_bar.html";?>
		<div class="row">
			<div class="col-sm-3 d-none d-sm-block" id="left_panel">
				<?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/left_bar.html";?>
			</div>
			<div class="col-sm-9">
				<div class="h3"><?php echo $main;?></div>
				<div id="content">...</div>
			</div>
		</div>
	</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/blocks/html/footer.html";?>
<script><?php echo $set;?></script>
</body>
</html>
