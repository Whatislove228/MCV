<?php include ROOT . '/views/layouts/header.php'; ?>



    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <div class="message">
                    <?php if($result) :?>
                    <p>Регистриция прошла успешно</p>
                    <?php else :?>
                    <?php if(isset($errors) && is_array($errors)) : ?>
                    <ul>
                        <?php foreach($errors as $error) : ?>
                            <li>- <?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                        <div class="space">

                        </div>
                    <?php endif; ?>
                </div>


                <h1 class="text-center"></h1>

                <form id="contact-form" method="post" >

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Firstname *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" value = "<?php echo $name ?>" placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Lastname *</label>
                                    <input id="form_lastname" type="text" name="surname" value = "<?php echo $surname ?>" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" value = "<?php echo $email ?>" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_lastname">Password *</label>
                                    <input id="form_lastname" type="password" name="password" value = "<?php echo $password ?>" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" value = "<?php echo $phone ?>" class="form-control" placeholder="Please enter your phone">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <input type="submit" name="submit" class="btn btn-success btn-send" value="Send message">
                            </div>

                        </div>
                        <?php endif ;?>
                    </div>

                </form>

            </div><!-- /.col-lg-8 col-lg-offset-2 -->

        </div> <!-- /.row-->

    </div> <!-- /.container-->

    </body>
    </html>

<?php include ROOT . '/views/layouts/footer.php'; ?>