<?php

    $mysqli = false;
    function connectDB(){ //функция подключения БД
        global $mysqli;
        $mysqli = new mysqli("localhost", "root", "", "shoes_base");
        $mysqli->query("SET NAME 'utf-8'");
    }

    function closeDB(){ //функция отключения БД, чтобы сайт не тормозил
        global $mysqli;
        $mysqli->close ();
    }

?>