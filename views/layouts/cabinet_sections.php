<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Разделы</h2>
        <div class="panel-group category-products">

            <?php
            $sections = [
                0 => [
                    "name" => "Редактирование даннных",
                    "link" => "cabinet/edit",
                ],
                1 => [
                    "name" => "История покупок",
                    "link" => "cabinet/order_history",
                ],
            ];
            ?>
            <?php foreach($sections as $num => $sectionItem):?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <?php
                            $is_active = '';
                            if($sectionItem['link'] == trim($_SERVER["REQUEST_URI"], '/'))
                            {
                                $is_active = 'active';
                            }
                            ?>
                            <a href="/<?php echo $sectionItem['link'];?>" class="<?php echo $is_active;?>">
                                <?php echo $sectionItem['name'];?>
                            </a>
                        </h4>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <?php if(isset($adminButton) && $adminButton): ?>
                            <a href="/admin/" class="">Админпанель</a>
                        <?php endif; ?>
                    </h4>
                </div>
            </div>

        </div>
    </div>
</div>