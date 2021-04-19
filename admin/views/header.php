<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<!-- Menu -->
<div class="container-fluid">
    <div class="row bg-light">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <a class="navbar-brand" href="#">Админка</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/admin/">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/products/list">Товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/categories/list">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/sizes/list">Размеры</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/orders/list">Заказы</a>
                </li>
                </ul>
            </div>
        </nav>
    </div>
</div>