<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Регистрация";
  require_once "blocks/head.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#done").click(function () {
        $("#messageShow").hide();
        var email = $("#login").val();
        var password = $("#password").val();
        var fail = "";
        if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) {
          fail = "<p>Вы ввели некоректный E-mail</p>";
        }
        else if (password.length < 6) {
          fail = "<p>Пароль должен содержать не меньше 6 символов</p>";
        }
        if (fail != "") {
          $('#messageShow').html(fail + "<div class='clear'><br></div>");
          $('#messageShow').show();
          return false;
        }
      });
    });
  </script>
</head>

<body>
  <?php require_once "blocks/header.php" ?>

  <?
  // Страница регистрации нового пользователя
  
  // Соединямся с БД
  $link = mysqli_connect("localhost", "root", "", "shoes_base");

  if (isset($_POST['submit'])) {
    $err = [];

    // проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "'");
    if (mysqli_num_rows($query) > 0) {
      $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if (count($err) == 0) {

      $login = $_POST['login'];
      $usname = $_POST['usname'];
      $ussecname = $_POST['ussecname'];

      // Убераем лишние пробелы и делаем двойное хеширование
      $password = md5(md5(trim($_POST['password'])));

      mysqli_query($link, "INSERT INTO users SET user_login='" . $login . "', user_password='" . $password . "', user_name='" . $usname . "', user_secname='" . $ussecname . "'");
      header("Location: vhod.php");
      exit();
    }
  }
  ?>

  <form method="POST">
    <div id="osn">
      <div id="osnova1">
        <h2>Регистрация</h2>
        <input type="text" placeholder="Укажите имя" id="usname" name="usname" required class="pole1">
        <input type="text" placeholder="Укажите фамилию" id="ussecname" name="ussecname" required class="pole1">
        <input type="text" placeholder="Укажите e-mail" id="login" name="login" required class="pole1">
        <input type="password" placeholder="Укажите пароль" id="password" name="password" required class="pole1">
        
<div id="a1">  <button name="submit" id="done" class="registerbtn">Зарегестрироваться</button><br><br>
        <div id="messageShow"></div></div>
        
      
      </div>
    </div>
  </form>
  <?php require_once "blocks/footer.php" ?>
</body>

</html>