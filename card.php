<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Корзина";
  require_once "blocks/head.php";
  $shoes = getCart();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <div id="osn">
    <div class="price">
      <center>
        <div class="nadpis_corz">

          <span class="corz">Корзина</span>

        </div>

        <div class="spisok_dobav">
          <?php
          $summa = 0;
          $vsegotovarov = 0;
          for ($i = 0; $i < count($shoes); $i++) {
            $sid = $shoes[$i]["id"];
            $stitle = $shoes[$i]["title"];
            $sprice = $shoes[$i]["price"];
            $savatar = $shoes[$i]["shoes_avatar"];
            $sopisanie=$shoes[$i]["opisanie"];
            $scollection = $shoes[$i]["collection"];
            $summa = $summa + $shoes[$i]['price'];
            echo '<div class="item">
            <img src="' . $shoes[$i]["shoes_avatar"] . '" class="minipizza" alt="">
            <div class="name_pizza_razmer">
              <div class="namepizza">' . $shoes[$i]["title"] . '</div>
              <div class="parampizza" span>45 RU</div>
            </div>
            <div class="kol-vo">

              <div class="chislo2">' . $shoes[$i]["price"] . ' Руб.</div>

              <form method="POST"><button class="crest" name="deleteproduct' . $sid . '">Удалить</button></form>
            </div>
          </div>';
           $vsegotovarov = count($shoes);
            if (isset($_POST["deleteproduct$sid"])) {
              $host = 'localhost'; // Хост, у нас все локально
              $user = 'root'; // Имя созданного вами пользователя
              $pass = ''; // Установленный вами пароль пользователю
              $db_name = 'shoes_base'; // Имя базы данных
              $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
              mysqli_query($link, "DELETE FROM products WHERE id = '$sid'");
              header("Location: card.php");
            }
          }

          ?>



          <div class="nadpis_corz">
            <?php echo '<div class="vsego">Всего товаров: <b>' . $vsegotovarov . ' шт.</b></div>'; ?>
            <?php echo '<div class="summa">Сумма заказа: <b>' . $summa . ' Руб.</b></div>' ?>

          </div>
          <div class="nadpis_corz">
            <div class="nazad1"><span class="buttpadd2" onclick="history.back();return false;">Вернуться назад</span></div>

            <div class="oplata"><span class="buttpadd2">Оплатить сейчас</span></div>
          </div>
        </div>
      </center>
    </div>
  </div>
  <?php require_once "blocks/footer.php" ?>
</body>

</html>