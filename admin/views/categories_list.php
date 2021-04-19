<div class="container">
    <h2 class="mt-4">Список категорий</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Название</th>
                <th scope="col">Дата создания</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $category) : ?>
            <tr>
                <th><?=$category['id'];?></th>
                <td><?=$category['name'];?></td>
                <td><?=date('d.m.Y H:i', strtotime($category['create_time']));?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>