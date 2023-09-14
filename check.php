<?
// Скрипт проверки

// Соединямся с БД
$link = mysqli_connect("localhost", "root", "", "shoes_base");


if (isset($_COOKIE['id'])) {
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '" . intval($_COOKIE['id']) . "' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);

    if (
        ($userdata['user_id'] !== $_COOKIE['id'])
    ) {
        setcookie("id", "", time() - 3600 * 24 * 30 * 12, "/");
        setcookie("hash", "", time() - 3600 * 24 * 30 * 12, "/", null, null, true); // httponly !!!
        print "Хм, что-то не получилось";
    } else {
        /*print "Привет, ".$userdata['user_login'].". Всё работает!";*/

        header("Location: index.php");
        exit();
    }
} else {
    print "Включите куки";
}


?>