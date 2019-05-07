<?php include_once ROOT.'/views/layouts/admin-header.php' ?>
<main>
    <div class="containet">
        <div class="col-md-6" style=" margin: 0 25% 0 25%;">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">
                    <p>Название товара</p>
                    <input class="inp-reg-form" type="text" name="name" placeholder="Название" value="<?php echo $product['name'] ?>">

                    <p>Код товара</p>
                    <input class="inp-reg-form" type="text" name="code" placeholder="Код" value="<?php echo $product['code'] ?>">

                    <p>Стоимость товара</p>
                    <input  class="inp-reg-form" type="text" name="price" placeholder="Цена" value="<?php echo $product['price']?>">

                    <p>Категория</p>
                    <select class="inp-reg-form" name="catefory_id">
                        <?php if (is_array($categoryList)) : ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']?>" 
                                        <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                    <?php echo $category['name'] ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </select>

                    <p>Бренд</p>
                    <select class="inp-reg-form" name="brand_id">
                        <?php if (is_array($brandList)) : ?>
                            <?php foreach ($brandList as $brand): ?>
                                <option value="<?php echo $brand['id']?>" 
                                        <?php if ($product['brand_id'] == $brand['id']) echo ' selected="selected"'; ?>>
                                    <?php echo $brand['name'] ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </select>

                    <p>Изображение товара</p>
                    <img src="<?php echo Product::getImage($product['id']); ?>" width="200"alt="<?php echo $product['name'] ?>">
                    <input class="inp-reg-form" type="file" name="image" value="<?php echo $product['image']; ?>">

                    <p>Подробное описание</p>
                    <textarea class="inp-reg-form" name="description" cols="30" rows="10"><?php echo $product['description']?></textarea><br>

                    <p>Наличие на складе</p>
                    <select class="inp-reg-form" name="availability">
                        <option value="1" <?php if ($product['availability'] == 1) echo ' selected="selected"'; ?> >Да</option>
                        <option value="0" <?php if ($product['availability'] == 0) echo ' selected="selected"'; ?> >Нет</option>
                    </select>

                    <p>Новинка</p>
                    <select class="inp-reg-form" name="if_new">
                        <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?> >Да</option>
                        <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?> >Нет</option>
                    </select>

                    <p>Рекомендуемый</p>
                    <select class="inp-reg-form" name="if_recomended">
                        <option value="1" <?php if ($product['is_recomended'] == 1) echo ' selected="selected"'; ?> >Да</option>
                        <option value="0" <?php if ($product['is_recomended'] == 0) echo ' selected="selected"'; ?> >Нет</option>
                    </select>


                    <p>Статус</p>
                    <select class="inp-reg-form" name="status">
                        <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?> >Да</option>
                        <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?> >Нет</option>
                    </select><br>

                    <input type="submit" name="submit" class="btn btn-default inp-reg-form" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once ROOT.'/views/layouts/admin-footer.php' ?>