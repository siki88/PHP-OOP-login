<?php
$db = new PDO('mysql:host=localhost', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo = 'CREATE DATABASE IF NOT EXISTS shop';
        $db->exec($pdo);
        $pdo = 'use shop';
        $db->exec($pdo);
    $pdo = 'CREATE TABLE IF NOT EXISTS uzivatele (
                id  INTEGER(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                jmeno VARCHAR(40) NOT NULL,
                heslo VARCHAR(100),
                email VARCHAR(50)
              )DEFAULT CHARACTER SET utf8';
    header('Location: index.php');
try {
  $db->query($pdo); // slouží k posílání na server
} catch (PDOException $e) {
  echo $e->getMessage();
}
