<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- end div#menu -->
    <div id="page">
        <div id="page-bgtop">
            <div id="content">

                <div class="post">
                    <h2 class="title"><a href="/news/<?php echo $newsItem['id'];?>"><?php echo $newsItem['title'];?></a></h2>
                    <br/>
                    <p><b><?php echo $newsItem['author_name'];?></b> at <?php echo $newsItem['date'];?></p>
                    <div class="entry">
                        <p><?php echo $newsItem['content'];?></p>
                    </div>
                    <div class="meta">
                        <p class="links"><a href="/news/" class="comments">Back to all news</a></p>
                    </div>
                </div>



            </div>

            <!-- end div#sidebar -->
            <div style="clear: both; height: 1px"></div>
        </div>
    </div>
    <!-- end div#page -->

</div>
<!-- end div#wrapper -->
</body>
</html>
<?php include ROOT . '/views/layouts/footer.php'; ?>