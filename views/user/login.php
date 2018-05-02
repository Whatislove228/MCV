<?php include ROOT . '/views/layouts/header.php'; ?>



    <div class="container">

        <div class="row">

            <div class="col-lg-8 col-lg-offset-2">
                <div class="message">
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


    <h1 class="text-center">Login</h1>

                <form id="contact-form" method="post" >

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Email *</label>
                                    <input id="form_email" type="email" name="email" value = "" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_password">Password *</label>
                                    <input id="form_password" type="password" name="password" value = "" class="form-control" placeholder="Please enter your password *" required="required" data-error="Lastname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <input type="submit" name="submit" class="btn btn-success btn-send" value="Sign in">
                            </div>

                        </div>
                    </div>

                </form>

            </div><!-- /.col-lg-8 col-lg-offset-2 -->

        </div> <!-- /.row-->

    </div> <!-- /.container-->

    </body>
    </html>

<?php include ROOT . '/views/layouts/footer.php'; ?>