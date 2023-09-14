<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "О нас";
  require_once "blocks/head.php";
  $shoes = getShoes();
  ?>
</head>

<body>
  <?php require_once "blocks/header.php" ?>
  <div id="osn">
    <div id="osnova2">
        <h2>Информация о нас</h2>
        <h3>В KislyakShop мы гарантируем высокое качество продукции, которую мы продаем. Вся обувь в нашем магазине изготовлена из качественных материалов и соответствует высоким стандартам производства. Мы также предлагаем различные размеры и модели кроссовок, чтобы каждый наш клиент нашел именно то, что ему нужно.</h3>
        <ul class="obr2">
            <li><a>Наша почта: <a href="#">кislyak_shop_help@mail.ru</a></li>
            <li><a>Наш номер телефона: <a href="#">8(919)77127790</a></li>
            <li><a>Наш адрес: <a href="#">г.Москва ул.Ленина Дом 182</a></li>
        </ul>
        <div id="karta">
          <img src="/images/map.png">
        </div> </div>
  </div>
  <?php require_once "blocks/footer.php" ?>

</body>

</html>