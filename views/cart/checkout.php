
<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>



            <div class="col-sm-9 padding-right">
                <div class="features_items">

                    <h2 class="title text-center">Оформить заказ</h2>

                    <form id="contact-form" method="post" >

                        <div class="messages"></div>
                        <?php if ($result): ?>

                            <p>Заказ оформлен. Мы Вам перезвоним. Через 3 секунды вас перенаправит на главную страницу</p>
                        <?php else: ?>

                        <p>Выбрано товаров:  на сумму: <?php echo $totalPrice; ?>, $</p><br/>

                        <?php if (!$result): ?>
                        </div>

                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                        <div class="controls">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Firstname *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" value = "<?php echo $userName ?>" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>

                            </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_phone">Phone *</label>
                                        <input id="form_phone" type="tel" name="phone" value = "" class="form-control" required="required" placeholder="Please enter your phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Message</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4"  data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <input type="submit" name="submit" class="btn btn-success btn-send" value="Send message">
                                </div>

                            </div>


                        </div>

                    </form>

                    <p> * Обязательные поля</p>

                </div>
                <?php endif; ?>
                <?php endif; ?>



            </div>

        </div>

    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>
