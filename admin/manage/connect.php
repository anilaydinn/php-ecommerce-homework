<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=ecommercedb;charset=utf8", 'root', '');
} catch (PDOException $err) {
    echo $err->getMessage();
}
