<?php require_once ROOT. '/views/layouts/header.php';?>

    <section>
        <div class="container">
            <div class="row">
                <!-- category-->
                <?php require_once ROOT. '/views/layouts/category.php';?>
                <!-- category-->
                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Запись в блоге</h2>
                        <?php if(isset($_SESSION['errors'])): ?>
                            <div class="alert alert-danger"><?php echo $_SESSION['errors'];?></div>
                            <?php unset($_SESSION['errors']);?>
                        <?php endif;?>
                        <div class="blog-post-area">
                            <div class="single-blog-post">
                                <h3><?php echo $blogItem['name'];?></h3>
                                <div class="post-meta">
                                    <?php $date = explode(' ', $blogItem['date']); ?>
                                    <ul>
                                        <li><i class="fa fa-calendar"></i><?php echo $date[0];?></li>
                                        <li><i class="fa fa-clock-o"></i> <?php echo $date[1];?></li>
                                    </ul>
                                </div>
                                <a href="">
                                    <img src="/upload/images/blog/<?php echo $blogItem['image'];?>" alt="">
                                </a>
                                <p><?php echo preg_replace("~\n~", "<br>", $blogItem['text']);?></p>
                                <div class="pager-area">
                                    <div class="pager pull-right">
                                        <a href="/blog/">Назад в блог</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

<?php require_once ROOT. '/views/layouts/footer.php'?>