<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $template['title']; ?></title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/preloader.css">
    <link rel="stylesheet" href="/assets/css/<?= $template['page_css']; ?>">
    <link rel="stylesheet" href="/assets/css/navigation_menu.css">

</head>

<body>
    <div class="lds-backdrop">
        <div class="lds-facebook">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="wrapper">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/parts/menu.php'); ?>
        <?php if (isset($template['breadcrumbs'])) : ?>

            <ul class="navigation_menu">
                <?php foreach ($template['breadcrumbs'] as $breadcrumb) : ?>
                    <li><a href="<?= $breadcrumb['link']; ?>"><?= $breadcrumb['label']; ?></a></li>
                <?php endforeach; ?>
            </ul>

        <?php endif; ?>