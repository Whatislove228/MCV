<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="comments">
        <h3 class="title-comments">Комментарии (<?= $count?>)</h3>
        <?php foreach ($commentList as $comment) :?>
        <ul class="media-list">
            <li class="media">
                <div class="media-body">
                    <div class="media-heading">
                        <div class="metadata">
                            <span class="date"><?= $comment['comment_data'] ?></span>
                        </div>
                    </div>
                </div>
            </li>
                    <div class="media-text text-justify"><?= $comment['comment_text'] ?></div>
            <br>
            <hr>
            <?php endforeach ;?>
            <?php echo $pagination->get(); ?>
            <?php include ROOT . '/views/layouts/footer.php'; ?>
