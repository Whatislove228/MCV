
<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>

                    <div class="panel-group category-products" id="accordian">
                        <?php foreach ($categories as $categoryItem) :?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="/category/<?php echo $categoryItem['id'];?>"><?=$categoryItem['name']?></a></h4>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div><!--/category-products-->


                    <div class="shipping text-center"><!--shipping-->
                        <img src="/template/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Последние записи в блоге</h2>
                    <div class="single-blog-post">
                        <?php foreach ($newsList as $news) :?>
                        <h3><?= $news['title']?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?= $news['date']?></li>
                                <li><i class="fa fa-calendar"></i><?= $news['author_name']?></li>
                            </ul>
                        </div>
                        <a href="">
                            <img src='<?= $news['preview']?>'>
                        </a>
                        <p><?= $news['short_content'] ?></p>
                        <a  class="btn btn-primary" href="/news/<?=$news['id']?>">Читать полностью</a>
                        <?php endforeach;?>
                    </div>

                    <div class="pagination-area">
                        <ul class="pagination">
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>

<?php include ROOT . '/views/layouts/footer.php'; ?>