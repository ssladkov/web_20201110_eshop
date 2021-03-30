<?php

function d($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function get_db_result_assoc($link, $sql, $order = '', $limits = []) {
    $result = [];
    if($order != '') {
        $sql .= ' ORDER BY ' . $order;
    }
    if(!empty($limits)) {
        $sql .= " LIMIT $limits[0], $limits[1]";
    }
    $query_result = mysqli_query($link, $sql);
    while($row = mysqli_fetch_assoc($query_result)) {
        //[] - добавляет новый элемент массива как в js push
        $result[] = $row;
    }
    return $result;
}

function get_db_one_record($link, $sql) {
    $result = get_db_result_assoc($link, $sql);
    return empty($result) ? 404 : $result[0];
}

function get_records_agregate_by($link, $sql, $by_alias = 'COUNT(*)') {
    $result = get_db_one_record($link, $sql);
    return $result[$by_alias]; 
}

function insert_db_row($link, $table_name, $fields, $post) {
    $result = [
        'last_id' => 0,
        'error_msg' => ''
    ];
    $keys_str = implode(',', $fields);
    
    $values_str = '';
    foreach($fields as $field) {
        //$values_str = $values_str . "'$value',";
        $value = mysqli_real_escape_string($link, $post[$field]);
        $values_str.= "'$value',";
    }
    $values_str = substr($values_str, 0, -1);


    $sql = "INSERT INTO $table_name ($keys_str) VALUES ($values_str)";
    mysqli_query($link, $sql);
    //результат выполнения ассоциируется с $link
    //ошибки и id записи можно получить тоже через $link
    if($error = mysqli_error($link)) {
        $result['error_msg'] = $error;
    } else {
        $result['last_id'] = mysqli_insert_id($link);
    }
    return $result;
}
?>