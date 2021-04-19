<div class="container">
    <h2 class="mt-4">Список продуктов</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Артикул</th>
                <th scope="col">Описание</th>
                <th scope="col">Создан</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $product) : ?>
            <tr>
                <th><?=$product['id'];?></th>
                <td><?=$product['name'];?></td>
                <td><?=$product['price'];?></td>
                <td><?=$product['sku'];?></td>
                <td><?=$product['description'];?></td>
                <td><?=date('d.m.Y H:i', strtotime($product['create_time']));?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/admin/products/create" class="btn btn-success float-right mt-3">Добавить продукт</a>
</div>