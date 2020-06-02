
    <div class="blog-post-area">
        <?php foreach($blogItems as $num => $blogItem): ?>
        <div class="single-blog-post">
            <h3><?php echo $blogItem['name'];?></h3>
            <div class="post-meta">
                <?php
                    $date = explode(' ', $blogItem['date']);
                    $text = substr($blogItem['text'], 0, 200);
                    $text = rtrim($text, "!.,-");

                ?>

                <ul>
                    <li><i class="fa fa-calendar"></i><?php echo $date[0];?></li>
                    <li><i class="fa fa-clock-o"></i> <?php echo $date[1];?></li>
                </ul>
            </div>
            <a href="">
                <img src="/upload/images/blog/<?php echo $blogItem['image'];?>" alt="">
            </a>
            <p><?php echo $text."...";?></p>
            <a  class="btn btn-primary" href="/blog/view/<?php echo $blogItem['id'];?>">Читать полностью</a>
        </div>
        <hr>
        <?php endforeach; ?>
    </div>
