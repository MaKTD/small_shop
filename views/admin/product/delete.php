<?php include_once ROOT.'/views/layouts/admin-header.php' ?>
<main>
    <div class="container">
        <div class="row">
            <h2>Удалить товар #<?php echo $id ?></h2>
            <h5>Хотите удалить этот товар?</h5>
            <form action="#" method="post">
                <input type="submit" name="submit" value="Удалить">
            </form>
        </div>
    </div>
</main>


<?php include_once ROOT.'/views/layouts/admin-footer.php' ?>