<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" >
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  	<div class="container">
  		<div class="row">
  			<div class="col-sm-12">  				
  	<h2>Registration form</h2>		
   <form method="post"  action="registration.php" class="registat">

   <div class="form-group">
    <label for="login">Логин</label>
    <div class="login"></div>
    <input type="text" class="form-control" id="login" name="login" required value="<?php if(isset($_POST['login'])) echo $_POST['login']; ?>" placeholder="Логин">
  </div>

  <div class="form-group">
    <label for="password">Пароль</label>
    <div class="password"></div>
    <input type="password" class="form-control" id="password" name="password" required value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" placeholder="Пароль">
  </div>

  <div class="form-group">
    <label for="confirm_password">Подтверждение пароля</label>
    <div class="confirm_password"></div>
    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required value="<?php if(isset($_POST['confirm_password'])) echo $_POST['confirm_password']; ?>" placeholder="Подтверждение пароля">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <div class="email"></div>
    <input type="email" class="form-control" id="email" name="email" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" required value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email">
  </div>
   <div class="form-group">
    <label for="name">Имя</label>
    <div class="name"></div>
       <input type="text" class="form-control" id="name" name="name" required value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" placeholder="Имя">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>

       </div>	
  	</div>
  	</div>
   <noscript>У вас отключен javascript, поэтому отправки формы не произойдет</noscript>
           <!-- Сообщение при ошибке -->
          <div class="alert alert-danger form-error d-none">
            Исправьте данные и отправьте форму ещё раз.
          </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/main.js"></script>
  </body>
</html>