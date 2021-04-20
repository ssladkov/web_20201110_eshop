<?php
// index.php будет заниматься роутингом и вызовом контроллера
// роутинг - это набор правил, которые ассоциируют запросы пользователя с конкретными php-скриптами
// все адреса админки будут в таком виде:
// admin/сущность/операция
$url_request = $_SERVER['REDIRECT_URL'];
//todo: проверять на админа
if($url_request == null) {
    header('HTTP/1.0 400 Bad request');
    die;
}
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');
$action = str_replace('/admin/', '', $url_request);

include($_SERVER['DOCUMENT_ROOT'].'/admin/controllers/handlerAdmin.php');

// echo 'This is index.php file';
// echo '<pre>';
// print_r($_GET);
// print_r($_POST);
// print_r($_SERVER);