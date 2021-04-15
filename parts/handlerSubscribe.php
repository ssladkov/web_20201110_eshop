<?php
$link = mysqli_connect('localhost', 'root', '', 'web_20201011_eshop');
if (!$link) {
    die("Не удалось подключиться к БД: " . mysqli_connect_error());
}
mysqli_set_charset($link , "utf8");

$sql = "SELECT email FROM subscribers WHERE email = '{$_GET['email']}'";
$result_email = get_db_one_record($link, $sql);
if($result_email == 404) {
    $result = insert_db_row($link, 'subscribers', ['email'], $_GET);
    echo 'ok';
} else {
    echo 'not_uniq';
}
sleep(3);
echo $_GET['email'];