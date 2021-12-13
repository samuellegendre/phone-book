<?php
$HOST = "localhost";
$DBNAME = "phone_book";
$CHARSET = "utf8";
$USERNAME = "root";
$PASSWORD = "Automne,2021";

try {
    return new PDO("mysql:host=$HOST;dbname=$DBNAME;charset=$CHARSET;", $USERNAME, $PASSWORD);
} catch (Exception $e) {
    echo $e->getMessage();
}