<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Мужская коллекция";
  require_once "blocks/head.php";
  $shoes = getKatalog();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <div id="osn">
    <?php
    for ($i = 0; $i < count($shoes); $i++) {
      $sid = $shoes[$i]["id"];
      $stitle = $shoes[$i]["title"];
      $sprice = $shoes[$i]["price"];
      $savatar = $shoes[$i]["katalog_avatar"];
      $sopisanie=$shoes[$i]["opisanie"];
      echo '<form method="POST">
              <div class="card">
                <img src="' . $shoes[$i]["katalog_avatar"] . '" alt="" style="width:100%">
                <h1>' . $shoes[$i]["title"] . '</h1>
                <h1 class="opisanie">' .$shoes[$i]["opisanie"] . '</h1>
                <p class="price">' . $shoes[$i]["price"] . ' Руб.</p>
                <p><button name="addproduct' . $sid . '">Добавить в корзину</button></p>
                <p> <a href = "atricle.php"><button name="addatricle' . $sid . '">Подробнее</a></p>
              </div>
            </form>';


      if (isset($_POST["addproduct$sid"])) {
        $host = 'localhost'; // Хост, у нас все локально
        $user = 'root'; // Имя созданного вами пользователя
        $pass = ''; // Установленный вами пароль пользователю
        $db_name = 'shoes_base'; // Имя базы данных
        $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
        mysqli_query($link, "INSERT INTO `products` (`title`, `price`, `shoes_avatar`,`opisanie`) VALUES ('{$stitle}', '{$sprice}', '{$savatar}', '{$sopisanie}')");

      }
      if (isset($_POST["addatricle$sid"])) {
        $host = 'localhost'; // Хост, у нас все локально
        $user = 'root'; // Имя созданного вами пользователя
        $pass = ''; // Установленный вами пароль пользователю
        $db_name = 'shoes_base'; // Имя базы данных
        $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
        mysqli_query($link, "INSERT INTO `atricle` (`title`, `price`, `atr_avatar`,`opisanie`) VALUES ('{$stitle}', '{$sprice}', '{$savatar}', '{$sopisanie}')");

      }
    }
    ?>
  </div>


  
  <?php require_once "blocks/footer.php" ?>
</body>

</html>