<?php
include($_SERVER['DOCUMENT_ROOT'].'/parts/header_conf.php');

$sql = "SELECT email FROM subscribers WHERE email = '{$_GET['email']}'";
$result_email = get_db_one_record($link, $sql);
if($result_email == 404) {
    $result = insert_db_row($link, 'subscribers', ['email'], $_GET);
    echo 'ok';
} else {
    echo 'not_uniq';
}
echo $_GET['email'];