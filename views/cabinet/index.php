<?php require ROOT.'/views/layouts/header.php'; ?>
<div class="container">
    <div class="row">
        <h1>Личный кабинет</h1>
        <h2>Добро Пожаловать <?php echo $user['name']; ?></h2>
        <ul>
            <li><a href="/cabinet/edit">Редактировать данные</a></li>
            <li><a href="/cabinet/history">Список покупок</a></li>
        </ul>
    </div>
</div>

<?php require ROOT.'/views/layouts/footer.php'; ?>