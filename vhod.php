<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Авторизация";
  require_once "blocks/head.php";
  ?>
  <script>
    $(document).ready(function () {
      $("#done").click(function () {
        $("#messageShow").hide();
        var email = $("#login").val();
        var password = $("#password").val();
        var fail = "";
        if (email.split('@').length - 1 == 0 || email.split('.').length - 1 == 0) {
          fail = "Вы ввели неоректный E-mail";
        }
        else if (password.length < 6) {
          fail = "Пароль должен содержать не меньше 6 символов";
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
<?
// Страница авторизации

// Функция для генерации случайной строки
function generateCode($length = 6)
{
  $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
  $code = "";
  $clen = strlen($chars) - 1;
  while (strlen($code) < $length) {
    $code .= $chars[mt_rand(0, $clen)];
  }
  return $code;
}

// Соединямся с БД
$link = mysqli_connect("localhost", "root", "", "shoes_base");
if (isset($_POST['submit'])) {
  // Вытаскиваем из БД запись, у которой логин равняеться введенному
  $query = mysqli_query($link, "SELECT user_id, user_password FROM users WHERE user_login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1");
  $data = mysqli_fetch_assoc($query);
  $err = [];

  // Сравниваем пароли
  if ($data['user_password'] === md5(md5($_POST['password']))) {
    // Генерируем случайное число и шифруем его
    $hash = md5(generateCode(10));
    // Переводим IP в строку
    $insip = ", user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";




    // Ставим куки
    setcookie("id", $data['user_id'], time() + 60 * 60 * 24 * 30, "/");
    setcookie("hash", $hash, time() + 60 * 60 * 24 * 30, "/", null, null, true); // httponly !!!
    setcookie("login", $_POST['login']);

    // Переадресовываем браузер на страницу проверки нашего скрипта
    header("Location: check.php");
    exit();
  } else {
    $err[] = "Вы ввели неправильный логин/пароль";
  }
}
?>

<body>
  <?php require_once "blocks/header.php" ?>
  <form method="POST">
    <div id="osn">
      <div id="osnova1">
        <h2>Вход</h2>
        <input type="text" placeholder="Введите логин" id="login" name="login" required class="pole1">
        <input type="password" placeholder="Введите пароль" id="password" name="password" required class="pole1">
       <div id="s1"> <?php
        if (empty($err)) {

        } else {
          foreach ($err as $error) {
            echo "<p>" . $error . "</p>";
          }
        }
        ?>
       <div id="messageShow"></div>
        <button name="submit" id="done" class="registerbtn1">Войти</button>
      <div class="problem"><a  href="reg.php">Нету аккаунта? Зарегестрироваться</a></div></div>
      </div>
    </div>
  </form>
  <?php require_once "blocks/footer.php" ?>
</body>

</html>