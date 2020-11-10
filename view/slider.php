<div class="owl-carousel" id="postCarousel">
    <?php
        foreach($all_news as $i => $news){
            $news['image'] = @(in_array(@end(@explode('/', $news['image'])), $noImage) ? $news['image'] : 'https://cdn.ulak.news/'.@end(@explode('/', $news['image'])));
    ?>
        <div class="item">
            <article class="post-box" style="background-image: url(<?php echo $news['image']; ?>?w=500&h=800);">
                <div class="post-overlay">
                    <a href="#" class="post-category" title="<?php echo $news['title']; ?>" rel="tag"><?php echo $news['categories'][0]; ?></a>
                    <h3 class="post-title"><?php echo $news['title']; ?></h3>
                    <div class="post-meta">
                        <div class="post-meta-author-avatar">
                            <img alt="<?php echo $news['agency_title']; ?>" src="./img/web/mini/<?php echo $news['agency']; ?>.jpg" class="avatar" height="24" width="24">
                        </div>
                        <div class="post-meta-author-info">
                            <span class="post-meta-author-name">
                                <a href="#" title="<?php echo $news['agency_title']; ?>" rel="author"><?php echo $news['agency_title']; ?></a>
                            </span>
                            <span class="middot">·</span>
                            <span class="post-meta-date">
                                <abbr class="published updated" title="<?php echo $news['date']; ?>"><?php echo $ulak_class->time_since($news['date_u']); ?></abbr>
                            </span>
                        </div>
                    </div>
                </div>
                <a title="<?php echo $news['title']; ?>" href="/<?php echo $news['seo_link']; ?>" class="post-overlayLink"></a>
            </article>
        </div>
    <?php
        if($i===4){
            break;
        }
        }
        unset($news);
    ?>
</div>
