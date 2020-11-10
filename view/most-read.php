<div class="widget-item">
    <div class="w-header">
        <div class="w-title">Günün çok okunanları</div>
        <div class="w-seperator"></div>
    </div>
    <div class="w-boxed-post">
        <ul>
            <?php
                foreach($most_read as $key=>$news){
                    $news['image'] = @(in_array(@end(@explode('/', $news['image'])), $noImage) ? $news['image'] : 'https://cdn.ulak.news/'.@end(@explode('/', $news['image'])));
            ?>
                <li class="active">
                    <a title="<?php echo $news['title']; ?>" href="/<?php echo $news['seo_link']; ?>" style="background-image: url(<?php echo $news['image']; ?>?w=320&h=215);">
                        <div class="box-wrapper">
                            <div class="box-left">
                                <span><?php echo $key+1; ?></span>
                            </div>
                            <div class="box-right">
                                <h3 class="p-title"><?php echo $news['title']; ?></h3>
                                <div class="p-icons">
                                    <?php echo $news['read_times']; ?> defa okundu
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            <?php
                }
                unset($news);
            ?>
        </ul>
    </div>
</div>
