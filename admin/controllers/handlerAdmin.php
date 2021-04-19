<?php
/**
 * @var $action string
 * @var $link mysqli
 */

//экшн показа всех продуктов
if($action == 'products/list') {
    $sql = 'SELECT * FROM products';
    $products = get_db_result_assoc($link, $sql, 'name');
    renderAndDie('products_list', $products);
}

//экшн показа страницы формы и обработки сабмита
if($action == 'products/create') {
    //если сабмитится форма
    if(isset($_POST['name'])) {
        $data = $_POST;

        //разберёмся с картинкой
        if($uploaded_image = dealWithImage($_FILES)) {
            $data['image'] = $uploaded_image;
        } else {
            $data['image'] = '';
        }

        //начинаем транзакцию
        mysqli_begin_transaction($link);
        $fields = ['name', 'image', 'price', 'sku', 'description'];
        $insert_result = insert_db_row($link, 'products', $fields, $data);
        if(($product_id = $insert_result['last_id']) == 0) {
            mysqli_rollback($link);
            redirectAndDie('/admin/products/list');
        }

        //разбираемся с категорями
        if(!dealWithCategories($link, $data['categories_ids'], $product_id)) {
            mysqli_rollback($link);
            redirectAndDie('/admin/products/list');
        }

        //разбираемся с размерами
        if(!dealWithSizes($link, $data['sizes_ids'], $product_id)) {
            mysqli_rollback($link);
            redirectAndDie('/admin/products/list');
        }

        mysqli_commit($link);
        redirectAndDie('/admin/products/list');
    }

    $categories = get_db_result_assoc($link, 'SELECT * FROM categories', 'name');
    $sizes = get_db_result_assoc($link, 'SELECT * FROM sizes', 'id');
    $data = [
        'categories' => $categories,
        'sizes' => $sizes
    ];
    renderAndDie('product_create', $data);
}

//экшн показа всех категорий
if($action == 'categories/list') {
    $sql = 'SELECT * FROM categories';
    $categories = get_db_result_assoc($link, $sql, 'name');
    renderAndDie('categories_list', $categories);
}

//экшн показа всех размеров
if($action == 'sizes/list') {
    $sql = 'SELECT * FROM sizes';
    $sizes = get_db_result_assoc($link, $sql, 'id');
    renderAndDie('sizes_list', $sizes);
}

//экшн показа всех заказов
if($action == 'orders/list') {
    $sql = 'SELECT * FROM orders';
    $orders = get_db_result_assoc($link, $sql, 'create_time DESC');
    renderAndDie('orders_list', $orders);
}

function renderAndDie($view, $data = null) {
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/header.php");
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/$view.php");
    include($_SERVER['DOCUMENT_ROOT']."/admin/views/footer.php");
    die;
}

function redirectAndDie($location) {
    header("Location: $location");
    die;
}

function dealWithImage($files) {
    if(isset($files) && $files['image']['error'] == 0) {
        //найдём нашу картинку в суперглобальном массиве $_FILES
        /**
         *    [название_поля_input_name] => Array
            (
                [name] => MyFile.txt (название файла, как в браузере было выбрано)
                [type] => text/plain  (тип содержимого)
                [tmp_name] => /tmp/php/php1h4j1o (временный путь хранения файла)
                [error] => UPLOAD_ERR_OK  (= 0) (0 - ошибок не было при загрузке)
                [size] => 123 (размер в байтах)
            )
         */
        //возьмём расширение файла
        $file_parts = explode('.', $files['image']['name']);
        $file_ext = array_pop($file_parts);

        //сгенерируем новое уникальное название файла
        //для этого возьмём количество секунд time() добавим рандомное значение rand() и построим хэш md5()
        $new_file_name = md5(time() . rand(100, 65000)) . '.' . $file_ext;
        //перенесём файл с временного пути хранения в конкретное место
        move_uploaded_file($files['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/uploads/images/$new_file_name");
        return $new_file_name;
    } else {
        return false;
    }
}

function dealWithCategories($link, $categories_ids, $product_id) {
    if(count($categories_ids) != 0) {
        foreach ($categories_ids as $category_id) {
            $data = ['product_id' => $product_id, 'category_id' => $category_id];
            $insert_result = insert_db_row($link, 'product_category', array_keys($data), $data);
            if ($insert_result['last_id'] == 0) {
                return false;
            }
        }

    }
    return true;
}

function dealWithSizes($link, $sizes_ids, $product_id) {
    if(count($sizes_ids) != 0) {
        foreach ($sizes_ids as $size_id) {
            $data = ['product_id' => $product_id, 'size_id' => $size_id];
            $insert_result = insert_db_row($link, 'product_size', array_keys($data), $data);
            if ($insert_result['last_id'] == 0) {
                return false;
            }
        }

    }
    return true;
}
