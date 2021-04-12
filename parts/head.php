<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/mini-game.css">
    <title><?php echo $title; ?></title>
    <!-- Комментарий HTML не препятствует выполнению php кода! для этого нужно использовать комментарии php-->
    <!--<title><?php /* echo $title; */ ?></title>-->
    <?php
        $link = mysqli_connect('localhost', 'webdev_20201011', 'webdev_20201011', 'webdev_20201011');
        if (!$link) {
            die("Не удалось подключиться к БД: " . mysqli_connect_error());
        }
        mysqli_set_charset($link , "utf8");
    ?>
</head>