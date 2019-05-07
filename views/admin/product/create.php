<?php include_once ROOT.'/views/layouts/admin-header.php' ?>
<main>
    <div class="containet">
        <div class="col-md-6" style=" margin: 0 25% 0 25%;">
            <div class="login-form">
                <form action="#" method="post" enctype="multipart/form-data">
                    <p>Название товара</p>
                    <input class="inp-reg-form" type="text" name="name" placeholder="Название" >

                    <p>Код товара</p>
                    <input class="inp-reg-form" type="text" name="code" placeholder="Код" value="">

                    <p>Стоимость товара</p>
                    <input  class="inp-reg-form" type="text" name="price" placeholder="Цена" value="">

                    <p>Категория</p>
                    <select class="inp-reg-form" name="catefory_id">
                        <?php if (is_array($categoryList)) : ?>
                            <?php foreach ($categoryList as $category): ?>
                                <option value="<?php echo $category['id']?>">
                                    <?php echo $category['name'] ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </select>

                    <p>Бренд</p>
                    <select class="inp-reg-form" name="brand_id">
                        <?php if (is_array($brandList)) : ?>
                            <?php foreach ($brandList as $brand): ?>
                                <option value="<?php echo $brand['id']?>">
                                    <?php echo $brand['name'] ?>
                                </option>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </select>

                    <p>Изображение товара</p>
                    <input type="file" name="image" placeholder="" value="">

                    <p>Подробное описание</p>
                    <textarea class="inp-reg-form" name="description" cols="30" rows="10"></textarea><br>

                    <p>Наличие на складе</p>
                    <select class="inp-reg-form" name="availability">
                        <option value="1" selected=>Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <p>Новинка</p>
                    <select class="inp-reg-form" name="if_new">
                        <option value="1" selected=>Да</option>
                        <option value="0">Нет</option>
                    </select>

                    <p>Рекомендуемый</p>
                    <select class="inp-reg-form" name="if_recomended">
                        <option value="1" selected=>Да</option>
                        <option value="0">Нет</option>
                    </select>


                    <p>Статус</p>
                    <select class="inp-reg-form" name="status">
                        <option value="1" selected=>Да</option>
                        <option value="0">Нет</option>
                    </select><br>

                    <input type="submit" name="submit" class="btn btn-default inp-reg-form" value="Сохранить"><br>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include_once ROOT.'/views/layouts/admin-footer.php' ?>