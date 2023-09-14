<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Скидки и акции";
  require_once "blocks/head.php";
  $shoes = getSkidki();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <div id="osn">
    <?php
    for ($i = 0; $i < count($shoes); $i++) {
      $sid = $shoes[$i]["skidki_id"];
      $stitle = $shoes[$i]["skidki_title"];
      $sprice = $shoes[$i]["skidki_price"];
      $soldprice-$shoes[$i]["old_price"];
      $savatar = $shoes[$i]["skidki_avatar"];
      $sopisanie=$shoes[$i]["opisanie"];
      echo '<form method="POST">
              <div class="card">
                <img src="' . $shoes[$i]["skidki_avatar"] . '" alt="" style="width:100%">
                <h1>' . $shoes[$i]["skidki_title"] . '</h1>
                <h1 class="opisanie">' .$shoes[$i]["opisanie"] . '</h1>
                <p class="old_skidki">' . $shoes[$i]["old_price"] . ' Руб.</p>
                <p class="price_skidki">' . $shoes[$i]["skidki_price"] . ' Руб.</p>
                <p><button name="addproduct' . $sid . '">Добавить в корзину</button></p>
                <p> <a href = "atricle.php?id='.$shoes[$i]["id"].'"><button name="addatricle' . $sid . '">Подробнее</a></p>
              </div>
            </form>';


      if (isset($_POST["addproduct$sid"])) {
        $host = 'localhost'; // Хост, у нас все локально
        $user = 'root'; // Имя созданного вами пользователя
        $pass = ''; // Установленный вами пароль пользователю
        $db_name = 'shoes_base'; // Имя базы данных
        $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
        mysqli_query($link, "INSERT INTO `products` (`title`, `price`, `shoes_avatar`) VALUES ('{$stitle}', '{$sprice}', '{$savatar}')");

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