<?php include ROOT . '/views/layouts/header.php'; ?>

    <title>Product</title>
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
                    <div class="product-details"><!--product-details-->
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="/upload/images/products/<?=$product['id']?>.jpg" alt="" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                    <h2><?php echo $product['name'];?></h2>
                                    <p>Код товара: <?php echo $product['code'];?></p>
                                <span>
                                    <span>US $<?php echo $product['price'];?></span>
                                     <?php if($product['availability'] == 1): ?>
                                         <a href="/cart/add/<?php echo $product['id']?>" data-id ="<?php echo  $product['id']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                     <?php else :?>
                                         <div class="btn btn-default solved">Нет в наличии</div>
                                     <?php endif ;?>
                                </span>
                                    <?php if($product['availability'] == 1): ?>
                                    <p><b>Наличие:</b> На складе</p>
                                    <?php else :?>
                                    <p><b>Наличие:</b> Нет на складе</p>
                                    <?php endif ;?>
                                </div><!--/product-information-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5>Описание товара</h5>
                                <?php echo $product['description'];?>
                            </div>
                        </div>
                    </div><!--/product-details-->
                    <p class="commnets-title">Коментарии</p>
                    <h1 class="text-center"></h1>
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
                        <?php if(isset($_SESSION['errors'])) :?>
                        <h1>Ошибка</h1>
                             <ul>
                                 <li>- <?= $_SESSION['errors'] ?></li>
                                 <?php unset($_SESSION['errors']) ?>
                            </ul>
                            <div class="space">

                            </div>
                        <?php endif; ?>
                    </div>

                    <form id="contact-form" method="post"  action="/comment/<?php echo $product['id'] ?>">

                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Textarea</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="text-area" rows="3" required="required" data-error="Lastname is required"></textarea>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <input type="submit" name="submit" class="btn btn-success btn-send" value="Send message">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="comments">
                            <p class="commnets-list">Комментарии (<?= $count?>)</p>
                            <?php if(isset($commentList)) :?>
                            <?php foreach ($commentList as $comment) :?>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <a href="/user/<?=$comment['user_id'] ?>" class="author">Имя: <?= $comment['commentator_name'] ?></a>
                                            <div class="metadata">
                                                <span class="date"><?= $comment['comment_data'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <div class="media-text text-justify"><?= $comment['comment_text'] ?></div>
                                <div class="footer-comment">
                                <span class="vote plus" title="Нравится">

                                </span>
                                    <span class="rating">
                            <a href="../respect/<?=$product['id'] ?>/<?= $comment['id'] ?>" class="rating"><i class="fa fa-thumbs-up"></i><?= $comment['respect'] ?>+</a>
                        </span>
                                </div>
                        </div>
                </div>
                <hr>
                <?php endforeach ;?>

                <?php echo $pagination->get(); ?>
                <?php else :?>
                    <p1>Комментариев пока нет!</p1>
                <?php endif; ?>
            </div>

        </div>

    </section>
    <!--COMMENTS-->




<?php include ROOT . '/views/layouts/footer.php'; ?>