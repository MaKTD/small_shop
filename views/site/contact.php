<?php require ROOT.'/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 reg-form">
                    <div class="signup-form">
                        <p class="message-box">

                        </p>
                        <h2>Напишите нам</h2>
                        <form action="#" method="post">
                            <input type="email" required placeholder="Ваш E-mail" class="inp-reg-form" name="email" value="">
                            <textarea class="feed-back-textarea" rows='7' cols='25' required placeholder="Сообщение"></textarea>
                            <input type="submit" class="btn btn-default inp-reg-form" value="Отправить" name="submit">
                        </form>
                    </div>
            </div>
        </div>
    </div>
</section>



<?php require ROOT.'/views/layouts/footer.php'; ?>