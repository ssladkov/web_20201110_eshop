<?php
session_start();

include($_SERVER['DOCUMENT_ROOT']. '/parts/header_conf.php');

$action = isset($_GET['action']) ? $_GET['action'] : null;
if($action == null) {
    header('HTTP/1.0 400 Bad Request');
    die;
}

if($action == 'register' && !empty($_POST)) {
    $data_fields = ['login', 'hash', 'first_name', 'last_name', 'email', 'phone'];
    $data_set = $_POST;
    $data_set['hash'] = md5($_POST['password']);
    $result = insert_db_row($link, 'users', $data_fields, $data_set);
    if($result['last_id'] != 0) {
        echo 'Поздравляем, вы успешно зарегистрировались!';
    } else {
        echo 'Произошла ошибка при добавлении пользователя: ' . $result['error_msg'];
    }
}

if($action == 'auth' && !empty($_POST)) {
    $login = $_POST['login'];
    $hash = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE login = '$login' AND hash = '$hash'";
    $result = get_db_one_record($link, $sql);
    if($result == 404) {
        echo 'Пользователь с такими данными не найден';
    } else {
        echo 'Вы успешно авторизовались';
        $_SESSION['user'] = [
            'id' => $result['id'],
            'name' => $result['first_name']
        ];
    }
}

if($action == 'logout') {
    unset($_SESSION['user']);
    header('Location: /');
}