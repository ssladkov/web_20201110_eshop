<?php
/**
 * @var $data Array
 */
?>
<form method="post" action="/admin/products/create" enctype="multipart/form-data">
    <!-- Форма продукта -->
    <div class="form-group row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Название</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?=(isset($product)?$product['name']:'');?>">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="price" class="col-sm-2 col-form-label">Цена</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="<?=(isset($product)?$product['price']:'');?>">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="sku" class="col-sm-2 col-form-label">Артикул</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="sku" name="sku" value="<?=(isset($product)?$product['sku']:'');?>">
        </div>
    </div>

    <?php if(isset($product) && $product['image'] != '') : ?>
        <div class="row mb-3">
            <img src="/uploads/images/<?=$product['image'];?>" class="img-responsive" alt="" style="width: 350px;">
        </div>
    <?php endif; ?>
    <div class="form-group row mb-3">
        <label for="image" class="col-sm-2 col-form-label">Изображение</label>
        <div class="col-sm-10">
            <input type="file" id="image" name="image">
        </div>
    </div>
    <div class="form-group row mb-3">
        <label for="description" class="col-sm-2 col-form-label">Описание</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="description" name="description"><?=(isset($product)?$product['description']:'');?></textarea>
        </div>
    </div>

    <!-- Категории -->
    <div class="form-group row mb-3">
        <label class="col-form-label col-sm-2 pt-0">Категории</label>
        <div class="col-sm-10">
            <?php foreach($data['categories'] as $category) : ?>
            <div class="form-check">
                <input class="form-check-input"
                       type="checkbox"
                       id="cat_<?=$category['id'];?>"
                       name="categories_ids[]"
                       value="<?=$category['id'];?>"
                    <?=(isset($product) && in_array($category['id'], $product['categories']) ? 'checked' : '');?>>
                <label class="form-check-label" for="cat_<?=$category['id'];?>">
                    <?=$category['name'];?>
                </label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Размеры -->
    <div class="form-group row mb-3">
        <label class="col-form-label col-sm-2 pt-0">Размеры</label>
        <div class="col-sm-10">
            <?php foreach($data['sizes'] as $sizes) : ?>
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           id="size_<?=$sizes['id'];?>"
                           name="sizes_ids[]"
                           value="<?=$sizes['id'];?>"
                        <?=(isset($product) && in_array($sizes['id'], $product['sizes']) ? 'checked' : '');?>>
                    <label class="form-check-label" for="size_<?=$sizes['id'];?>">
                        <?=$sizes['label'];?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <input type="submit" class="btn btn-success float-right" value="Добавить">
</form>