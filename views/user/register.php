<?php require ROOT.'/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 reg-form">
                <?php if ($result) : ?>
                    <span class="error-mg-block">Вы зарегистированы</span>
                <?php else: ?>
                    <div class="signup-form">
                        <p class="message-box">
                            <?php if ((isset($errorMessage)) && is_array($errorMessage)) : ?>
                                <?php foreach ($errorMessage as $message): ?>
                                    <span class="error-mg-block"><?php echo $message ?></span>
                                <?php endforeach; ?> 
                            <?php endif;?>
                        </p>
                        <h2>Регистрация</h2>
                        <form action="#" method="post">
                            <input type="text" required placeholder="Имя" class="inp-reg-form" name="name" value="<?php echo $name ?>">
                            <input type="email" required placeholder="E-mail" class="inp-reg-form" name="email" value="<?php echo $email ?>">
                            <input type="password" required placeholder="Пароль" class="inp-reg-form" name="pass" value="<?php echo $pass ?>">
                            <input type="submit" class="btn btn-default inp-reg-form" value="Регистрация" name="submit">
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php require ROOT.'/views/layouts/footer.php'; ?>