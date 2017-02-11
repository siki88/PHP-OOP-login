<?php
session_start();
unset($_SESSION['jmeno']);
header("Location: index.php");
?>
