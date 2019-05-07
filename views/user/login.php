<?php require ROOT.'/views/layouts/header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 reg-form">
            <?php if (isset($_SESSION['user'])) : ?>
                <h2>Вы уже авторизированны</h2>
            <?php else :?>
                <p class="message-box">
                    <?php if ((isset($errorMessage)) && is_array($errorMessage)) : ?>
                        <?php foreach ($errorMessage as $message): ?>
                            <span class="error-mg-block"><?php echo $message ?></span>
                        <?php endforeach; ?> 
                    <?php endif;?>
                </p>
                <h2>Вход на сайт</h2>
                <form action="#" method="post">
                    <input type="email" required placeholder="E-mail" class="inp-reg-form" name="email" value="<?php echo $email ?>">
                    <input type="password" required placeholder="Пароль" class="inp-reg-form" name="pass" value="<?php echo $pass ?>">
                    <input type="submit" class="btn btn-default inp-reg-form" value="Вход" name="submit">
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require ROOT.'/views/layouts/footer.php'; ?>