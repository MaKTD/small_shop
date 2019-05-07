<?php require ROOT.'/views/layouts/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 reg-form">
            <?php if ($result) : ?>
                <h2>Данные профиля изменены</h2>
            <?php else : ?>
                <p class="message-box">
                    <?php if ((isset($errorMessage)) && is_array($errorMessage)) : ?>
                        <?php foreach ($errorMessage as $message): ?>
                            <span class="error-mg-block"><?php echo $message ?></span>
                        <?php endforeach; ?> 
                    <?php endif;?>
                </p>
                <h2>Данные профиля</h2>
                <form action="#" method="post">
                    <input type="text" placeholder="Имя" class="inp-reg-form" name="name" value="<?php echo $name?>">
                    <input type="text" placeholder="Пароль" class="inp-reg-form" name="password" value="<?php echo $pass?>">
                    <input type="submit" class="btn btn-default inp-reg-form" value="Редактировать" name="submit">
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php require ROOT.'/views/layouts/footer.php'; ?>
