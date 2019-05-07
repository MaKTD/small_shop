<?php include_once ROOT.'/views/layouts/admin-header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul class="category-menu">
                        <a href="/admin/product/create"><li>Добавить Товар</li></a>
                    </ul>
                </div>
            </div>
            <div class="row">
                <table class="table-bordered table-striped table">
                    <tr>
                        <th>ID</th>
                        <th>Код</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($productsList as $product): ?>
                        <tr>
                            <th><?php echo $product['id'] ?></th>
                            <th><?php echo $product['code'] ?></th>
                            <th><?php echo $product['name'] ?></th>
                            <th><?php echo $product['price'] ?></th>
                            <th><a href="/admin/product/update/<?php echo $product['id']?>" title="редактировать"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></th>
                            <th><a href="/admin/product/delete/<?php echo $product['id']?>" title='удалить'><i class="fa fa-times" aria-hidden="true"></i></a></th>
                        </tr>
                        
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </main>

<?php include_once ROOT.'/views/layouts/admin-footer.php' ?>