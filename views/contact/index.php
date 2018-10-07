<?php include ROOT . '/views/layouts/header.php'; ?>

<title>Contact</title>
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
                <div class="contact-info"><!--product-details-->
                    <h1>Наши контакты</h1>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php include ROOT . '/views/layouts/footer.php'; ?>
