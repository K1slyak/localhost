<?php
require_once "connect.php";

$db_host = 'localhost'; // ваш хост
$db_name = 'shoes_base'; // ваша бд
$db_user = 'root'; // пользователь бд
$db_pass = ''; // пароль к бд
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // включаем сообщения об ошибках
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
$mysqli->set_charset("utf8mb4"); // задаем кодировку

$result = $mysqli->query('SELECT * FROM `shoes`'); // запрос на выборку
$resultcart = $mysqli->query('SELECT * FROM `products`'); // запрос на выборку
$resultfeedback = $mysqli->query('SELECT * FROM `feedback`'); // запрос на выборку
$resultfemale = $mysqli->query('SELECT * FROM `female`'); // запрос на выборку
$resultkatalog = $mysqli->query('SELECT * FROM `katalog`'); // запрос на выборку
$resultsport = $mysqli->query('SELECT * FROM `sport`'); // запрос на выборку
$resultatr= $mysqli->query('SELECT * FROM `atricle`');

function getShoes()
{
    global $mysqli;
    $resultshoes = $mysqli->query("SELECT * FROM `shoes` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultshoes);
}
function getAtricle()
{
    global $mysqli;
    $resultshoes = $mysqli->query("SELECT * FROM `atricle` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultshoes);
}
function getFemale()
{
    global $mysqli;
    $resultfemale = $mysqli->query("SELECT * FROM `female` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultfemale);
}
function getSport()
{
    global $mysqli;
    $resultsport = $mysqli->query("SELECT * FROM `sport` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultsport);
}
function getKatalog()
{
    global $mysqli;
    $resultkatalog = $mysqli->query("SELECT * FROM `katalog` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultkatalog);
}
function getSkidki()
{
    global $mysqli;
    $resultdiscount = $mysqli->query("SELECT * FROM `skidki` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultdiscount);
}
function getCart()
{
    global $mysqli;
    $resultcart = $mysqli->query("SELECT * FROM `products` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultcart);
}
function getBanners()
{
    global $mysqli;
    $resultbanners = $mysqli->query("SELECT * FROM `banners` ORDER BY 'id'"); // запрос на выборку
    closeDB();
    return resultToArray($resultbanners);
}

function resultToArray($resultpizza)
{
    $array = array();
    while (($row = $resultpizza->fetch_assoc()) != false)
        $array[] = $row;
    return $array;
}
?>
