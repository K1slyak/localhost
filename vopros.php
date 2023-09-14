<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $title = "Оставить отзыв о нас";
  require_once "blocks/head.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#submit").click(function () {
                $("#messageShow").hide();
                var name = $("#name").val();
                var message = $("#message").val();
                var fail = "";
                if (name.length < 3) {
                    fail = "Имя не меньше 3 символов";
                } else if (message.length < 20) {
                    fail = "Сообщение должно содержать не менее 20 символов";
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
  <?php
        if (isset($_POST["submit"])) {
            $host = 'localhost'; // Хост, у нас все локально
            $user = 'root'; // Имя созданного вами пользователя
            $pass = ''; // Установленный вами пароль пользователю
            $db_name = 'shoes_base'; // Имя базы данных
            $link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
            mysqli_query($link, "INSERT INTO `feedback` (`name_user`, `message`) VALUES ('{$_POST['name']}', '{$_POST['message']}')");
            header("Location: vopros.php");
            exit();
        }
        ?>
  <div id="osn">
    <div id="o1">
      <form name="form" method="post" id="form_message">
        <h2>Оставить отзыв</h2>
        <p>
        <div class="titles">Ваше имя</div> <input class="input3" id="name"  name="name" type="text" /> </p>
        <p>
        <div class="titles">Текст сообщения:</div><textarea name="message" id="message" cols="22" rows="5" class="texta1"></textarea>
        <div id="messageShow"></div>
        </p>
        <p>
        <button name="submit" id="submit">Отправить</button></p>
      </form>
      <center>

        </center>
    </div>
    
            </div>
            <div id="mes1">
            <div class="messagefeedback">
                <?php
                while ($row = $resultfeedback->fetch_assoc()) // получаем все строки в цикле по одной
                {
                    echo '<div class="namefeedback">' . $row['name_user'] . '</div><br><br>
                    <div class="comment">' . $row['message'] . '</div>
                    <hr class="hrheader">';
                }
                ?>
                
                </div>
  </div>
            
  <?php require_once "blocks/footer.php" ?>
</body>

</html>