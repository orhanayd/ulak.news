<?php
    if(isset($all_news))
    if(count($all_news)>0)
    foreach(array_slice($all_news, 4, 60) as $news){
?>
        <div class="timeline-item <?php echo $news['agency']; ?>">

            <div class="timeline-left">
                <a href="/kaynak_<?php echo $news['agency']; ?>.html" style="background-color: white;" class="timeline-category" data-zebra-tooltip title="<?php echo $news['agency_title']; ?>"><img alt="<?php echo $news['agency_title']; ?>" src="https://images.ulak.news/images/web/<?php echo $news['agency']; ?>.webp" class="avatar" height="24" width="24"></a>
                <span class="timeline-date"><?php echo $ulak_class->time_since($news['date_u']); ?></span>
            </div>

            <div class="timeline-right">
                <div class="timeline-post-image">
                    <a href="/<?php echo $news['seo_link']; ?>">
                        <img loading="lazy" src="<?php echo $news['image']; ?>?v=123.webp" width="260">
                    </a>
                </div>
                <div class="timeline-post-content">
                    <?php if(array_key_exists('categories', $news)){ foreach($news['categories'] as $cat){ echo '<a href="#" class="timeline-category-name">'.$cat.'</a> '; } } ?>
                    <a href="/<?php echo $news['seo_link']; ?>">
                        <h3 class="timeline-post-title"><?php echo $news['title']; ?></h3>
                    </a>
                    <div class="timeline-post-info">
                        <span class="dot"></span>
                        <span class="comment"><?php echo $news['read_times']; ?> defa okundu</span>
                    </div>
                </div>
            </div>

        </div>
<?php
    }
    unset($news);
?>