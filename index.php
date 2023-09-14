<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  $title = "KislyakShop";
  require_once "blocks/head.php";
  $shoes = getShoes();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <h2>Лучший магазин кроссовок в стране</h2>
  <div class="carousel">
    <div class="carousel-inner">
        <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
        <div class="carousel-item">
            <a href="katalog.php"><img src="images/man.jpg"></a>
        </div>
        <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item">
            <a href="female.php"><img src="images/female.jpg"></a>
        </div>
        <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
        <div class="carousel-item">
            <a href="sport.php"><img src="images/sport.jpg"></a>
        </div>
        <label for="carousel-3" class="carousel-control prev control-1">‹</label>
        <label for="carousel-2" class="carousel-control next control-1">›</label>
        <label for="carousel-1" class="carousel-control prev control-2">‹</label>
        <label for="carousel-3" class="carousel-control next control-2">›</label>
        <label for="carousel-2" class="carousel-control prev control-3">‹</label>
        <label for="carousel-1" class="carousel-control next control-3">›</label>
        <ol class="carousel-indicators">
            <li>
                <label for="carousel-1" class="carousel-bullet">•</label>
            </li>
            <li>
                <label for="carousel-2" class="carousel-bullet">•</label>
            </li>
            <li>
                <label for="carousel-3" class="carousel-bullet">•</label>
            </li>
        </ol>
    </div>
</div><h2>Хиты продаж</h2>
<div id="osn">
    
    <?php
    for ($i = 0; $i < count($shoes); $i++) {
      $sid = $shoes[$i]["id"];
      $stitle = $shoes[$i]["title"];
      $sprice = $shoes[$i]["price"];
      $savatar = $shoes[$i]["shoes_avatar"];
      $sopisanie=$shoes[$i]["opisanie"];
      echo '<form method="POST">
              <div class="card">
                <img src="' . $shoes[$i]["shoes_avatar"] . '" alt="" style="width:100%">
                <h1>' . $shoes[$i]["title"] . '</h1>
                <h1 class="opisanie">' .$shoes[$i]["opisanie"] . '</h1>
                <p class="price">' . $shoes[$i]["price"] . ' Руб.</p>
                <p><button name="addproduct' . $sid . '">Добавить в корзину</button></p>
                <p> <a href = "atricle.php?"><button name="addatricle' . $sid . '">Подробнее</a></p>
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
    }
  ?>
  </div>
    <div id="reclama"><?php
            $host = 'localhost'; // Хост, у нас все локально
            $user = 'root'; // Имя созданного вами пользователя
            $pass = ''; // Установленный вами пароль пользователю
            $db_name = 'shoes_base'; // Имя базы данных
            $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
            $result = mysqli_query($link, "SELECT * FROM `banners` WHERE `id` = 3");
            $user = mysqli_fetch_assoc($result);

            echo '<img src="' . $user['code'] . '" alt="">';
            ?></div>
  <?php require_once "blocks/footer.php" ?>

</body>

</html>