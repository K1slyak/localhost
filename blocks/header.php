<header>
    <div class="shapka">
    <div id="burger">
  <div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>
    <ul class="menu__box">
      <li><a class="menu__item" href="index.php">Главная</a></li>
      <li><a class="menu__item" href="skidki.php">Скидки</a></li>
      <li class="has-sub-menu">
        <a class="menu__item">Каталог</a>
        <ul class="sub-menu">
          <li><a class="menu__item" href="katalog.php">Мужская коллекция</a></li>
          <li><a class="menu__item" href="female.php">Женская коллекция</a></li>
          <li><a class="menu__item" href="sport.php">Спортивная обувь</a></li>
        </ul>
      </li>
      <li><a class="menu__item" href="vopros.php">Отзывы</a></li>
      <li><a class="menu__item" href="kontatk.php">Контакты</a></li>
      <?php
        if (isset($_COOKIE['id'])) {
          echo '<li><a class="menu__item" href="#">' . $_COOKIE['login'] . '</a></li>
                <li><a class="menu__item" href="functions/exit.php">Выход</a></li>';
        } else {
          echo '<li><a class="menu__item" href="vhod.php">Авторизация</a></li>';
        }
      ?>
    </ul>
  </div>
</div>
        <div id="logo"><a href="index.php"><img src="images/logo.png" alt=""></a></div>
        <div class="regcart">
            <div class="autoreg">
            <?php
                if (isset($_COOKIE['id'])) {

                    echo '<div class="autori"><a href="#">' . $_COOKIE['login'] . '</a></div>
                    <div class="regist"><a href="functions/exit.php">Выход</a></div>';
                } else {
                    echo '<div class="autori"><a href="vhod.php">Авторизация</a></div>
                    <div class="regist"><a href="reg.php">Регистрация</a></div>';
                }
                ?>
            </div>
            <?php
        require_once "functions/connect.php";
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name); // Соединяемся с базой
        // SQL запрос для получения количества элементов в таблице
        $sql = "SELECT COUNT(*) as count FROM products";
        
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<a href="card.php"><button class="cart"><b>Корзина | ' . $row["count"] . '</b></button></a>'; ?>
        </div>
    </div>
</header>