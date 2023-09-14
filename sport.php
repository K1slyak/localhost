<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Спортиваня обувь";
  require_once "blocks/head.php";
  $shoes = getSport();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <div id="osn">
    <?php
    for ($i = 0; $i < count($shoes); $i++) {
      $sid = $shoes[$i]["id"];
      $stitle = $shoes[$i]["title"];
      $sprice = $shoes[$i]["sport_price"];
      $savatar = $shoes[$i]["sport_avatar"];
      $sopisanie=$shoes[$i]["opisanie"];
      echo '<form method="POST">
              <div class="card">
                <img src="' . $shoes[$i]["sport_avatar"] . '" alt="" style="width:100%">
                <h1>' . $shoes[$i]["title"] . '</h1>
                <h1>' .$shoes[$i]["opisanie"] . '</h1>
                <p class="price">' . $shoes[$i]["sport_price"] . ' Руб.</p>
                <p><button name="addproduct' . $sid . '">Добавить в корзину</button></p>
                <p> <a href = "atricle.php"><button name="addatricle' . $sid . '">Подробнее</a></p>
              </div>
            </form>';


     
          }
          ?>
  </div>


  
  <?php require_once "blocks/footer.php" ?>
</body>

</html>