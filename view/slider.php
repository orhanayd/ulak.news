<div class="owl-carousel" id="postCarousel">
    <?php
        foreach($all_news as $i => $news){
    ?>
        <div class="item">
            <article class="post-box" style="background-image: url(<?php echo $news['image']; ?>);">
                <div class="post-overlay">
                    <a href="#" class="post-category" title="<?php echo $news['title']; ?>" rel="tag"><?php echo $news['categories'][0]; ?></a>
                    <h3 class="post-title"><?php echo $news['title']; ?></h3>
                    <div class="post-meta">
                        <div class="post-meta-author-avatar">
                            <img alt="<?php echo $news['agency_title']; ?>" src="https://images.ulak.news/images/web/<?php echo $news['agency']; ?>.webp" class="avatar" height="24" width="24">
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
                <a href="/<?php echo $news['seo_link']; ?>" class="post-overlayLink"></a>
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
