<?php include ("../config.php");?>
<?php include ("../auth/auth.php");?>
<!DOCTYPE html>
<html lang="en">
    <?php include ("../blocks/html/header.html");?>
<body class="text-center">
	<?php include ("blocks/html/side_bar.html");?>
	<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="row">
      <div class="col-4"></div>
      <div class="col-4">
        <div class="rounded p-5 shadow-lg auth">
          <div class="h3">Добро пожаловать на страницу авторизации</div>
          <form name="autorization" action="auth.php" method="POST"> 
            <div class="form-group">
              <label for="exampleInputLogin1">Логин</label>
              <input type="text" name="login" class="form-control" placeholder="Введите логин">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Пароль</label>
              <input type="password" name="password" class="form-control" placeholder="Введите пароль">
            </div>
            <div class="form-check">
              <input type="checkbox" name="save_cookie" value=1 class="form-check-input">
              <label class="form-check-label" for="exampleCheck1">Запомнить</label>
            </div>
            <button name="data" value="Вход" class="btn btn-dark">Войти</button>
          </form>
        </div>
	    </div>
      <div class="col-4"></div>
    </div>
  </div>
<?php include ("../blocks/html/footer.html");?>
<script><?php echo $set;?></script>
</body>
</html>
