<?php

session_start();
$_SESSION['text'] = 'Это текст из page1.php';
if(!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} 
$_SESSION['count']++;
echo $_SESSION['count'];