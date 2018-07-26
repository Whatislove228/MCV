
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
                    <form method="POST">
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#">Отсортировать <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><button type = "submit" name = "button" value="date">По дате</button></li>
                        </ul>
                    </div>
                    </form>
                    <div class="single-blog-post">
                        <?php foreach ($newsList as $news) :?>
                        <h3><?= $news['title']?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?= $news['date']?></li>
                                <li><i class="fa fa-calendar"></i><?= $news['author_name']?></li>
                                <li><i class="fa fa-calendar"></i><?= $news['id']?></li>
                            </ul>
                        </div>
                        <a href="">
                            <img src='<?= $news['preview']?>'>
                        </a>
                        <p><?= $news['short_content'] ?></p>
                        <a  class="btn btn-primary" href="/news/<?=$news['id']?>">Читать полностью</a>
                        <?php endforeach;?>
                    </div>

                    <div class="pagination">
                        <?php echo $pagination->get() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .pagination
    {
        margin-top: 10px;
    }
</style>

</body>
</html>

<?php include ROOT . '/views/layouts/footer.php'; ?>