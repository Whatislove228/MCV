<?php include ROOT . '/views/layouts/header.php'; ?>





    <section>
        <div class="container">
            <div class="row">

                <h3>Кабинет пользователя</h3>

                <h4>Привет, <?php echo $user['name'];?>!</h4>
                <ul>
                    <li><a href="/account/edit">Редактировать данные</a></li>
                    <li><a href="/account/delete">Удалить аккаунт</a></li>
                    <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
                </ul>

            </div>
        </div>
    </section>







<?php include ROOT . '/views/layouts/footer.php'; ?>